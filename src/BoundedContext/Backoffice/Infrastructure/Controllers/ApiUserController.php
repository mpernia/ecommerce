<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\ApiUser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Role;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\MassDestroyApiUserRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\StoreApiUserRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\UpdateApiUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApiUserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('api_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ApiUser::with(['roles', 'created_by'])->select(sprintf('%s.*', (new ApiUser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'api_user_show';
                $editGate      = 'api_user_edit';
                $deleteGate    = 'api_user_delete';
                $crudRoutePart = 'api-users';

                return view('partials.backoffice.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });

            $table->editColumn('roles', function ($row) {
                $labels = [];
                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active', 'roles']);

            return $table->make(true);
        }

        return view('backoffice.userManagement.apiUsers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('api_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('backoffice.userManagement.apiUsers.create', compact('roles'));
    }

    public function store(StoreApiUserRequest $request)
    {
        $apiUser = ApiUser::create($request->all());
        $apiUser->roles()->sync($request->input('roles', []));

        return redirect()->route('backoffice.api-users.index');
    }

    public function edit(ApiUser $apiUser)
    {
        abort_if(Gate::denies('api_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $apiUser->load('roles', 'created_by');

        return view('backoffice.userManagement.apiUsers.edit', compact('apiUser', 'roles'));
    }

    public function update(UpdateApiUserRequest $request, ApiUser $apiUser)
    {
        $apiUser->update($request->all());
        $apiUser->roles()->sync($request->input('roles', []));

        return redirect()->route('backoffice.api-users.index');
    }

    public function show(ApiUser $apiUser)
    {
        abort_if(Gate::denies('api_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apiUser->load('roles', 'created_by');

        return view('backoffice.userManagement.apiUsers.show', compact('apiUser'));
    }

    public function destroy(ApiUser $apiUser)
    {
        abort_if(Gate::denies('api_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apiUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyApiUserRequest $request)
    {
        $apiUsers = ApiUser::find(request('ids'));

        foreach ($apiUsers as $apiUser) {
            $apiUser->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
