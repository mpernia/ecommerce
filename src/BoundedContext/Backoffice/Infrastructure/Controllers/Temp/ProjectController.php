<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Project;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\ProjectStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyProjectRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreProjectRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Project::with(['client', 'status', 'created_by'])->select(sprintf('%s.*', (new Project)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_show';
                $editGate      = 'project_edit';
                $deleteGate    = 'project_delete';
                $crudRoutePart = 'projects';

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
            $table->addColumn('advertiser_first_name', function ($row) {
                return $row->client ? $row->client->first_name : '';
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('budget', function ($row) {
                return $row->budget ? $row->budget : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'status']);

            return $table->make(true);
        }

        return view('backoffice.temp.projects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Advertiser::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ProjectStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.projects.create', compact('clients', 'statuses'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        return redirect()->route('backoffice.stores.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Advertiser::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ProjectStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('client', 'status', 'created_by');

        return view('backoffice.temp.projects.edit', compact('clients', 'project', 'statuses'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('backoffice.stores.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('client', 'status', 'created_by');

        return view('backoffice.temp.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $projects = Project::find(request('ids'));

        foreach ($projects as $project) {
            $project->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
