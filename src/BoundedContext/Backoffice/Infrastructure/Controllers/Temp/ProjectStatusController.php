<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\ProjectStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyProjectStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreProjectStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateProjectStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('project_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProjectStatus::query()->select(sprintf('%s.*', (new ProjectStatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_status_show';
                $editGate      = 'project_status_edit';
                $deleteGate    = 'project_status_delete';
                $crudRoutePart = 'project-statuses';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('backoffice.temp.projectStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.projectStatuses.create');
    }

    public function store(StoreProjectStatusRequest $request)
    {
        $projectStatus = ProjectStatus::create($request->all());

        return redirect()->route('admin.project-statuses.index');
    }

    public function edit(ProjectStatus $projectStatus)
    {
        abort_if(Gate::denies('project_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.projectStatuses.edit', compact('projectStatus'));
    }

    public function update(UpdateProjectStatusRequest $request, ProjectStatus $projectStatus)
    {
        $projectStatus->update($request->all());

        return redirect()->route('admin.project-statuses.index');
    }

    public function show(ProjectStatus $projectStatus)
    {
        abort_if(Gate::denies('project_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.projectStatuses.show', compact('projectStatus'));
    }

    public function destroy(ProjectStatus $projectStatus)
    {
        abort_if(Gate::denies('project_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectStatusRequest $request)
    {
        $projectStatuses = ProjectStatus::find(request('ids'));

        foreach ($projectStatuses as $projectStatus) {
            $projectStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
