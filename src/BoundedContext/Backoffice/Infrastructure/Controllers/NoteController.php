<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Note;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Store;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyNoteRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreNoteRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateNoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Note::with(['store', 'created_by'])->select(sprintf('%s.*', (new Note)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'note_show';
                $editGate      = 'note_edit';
                $deleteGate    = 'note_delete';
                $crudRoutePart = 'notes';

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
            $table->addColumn('store_name', function ($row) {
                return $row->store ? $row->store->name : '';
            });

            $table->editColumn('note_text', function ($row) {
                return $row->note_text ? $row->note_text : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'project']);

            return $table->make(true);
        }

        return view('backoffice.advertiserManagement.notes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.advertiserManagement.notes.create', compact('stores'));
    }

    public function store(StoreNoteRequest $request)
    {
        $note = Note::create($request->all());

        return redirect()->route('backoffice.notes.index');
    }

    public function edit(Note $note)
    {
        abort_if(Gate::denies('note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $note->load('store', 'created_by');

        return view('backoffice.advertiserManagement.notes.edit', compact('note', 'stores'));
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->all());

        return redirect()->route('backoffice.notes.index');
    }

    public function show(Note $note)
    {
        abort_if(Gate::denies('note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $note->load('store', 'created_by');

        return view('backoffice.advertiserManagement.notes.show', compact('note'));
    }

    public function destroy(Note $note)
    {
        abort_if(Gate::denies('note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $note->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoteRequest $request)
    {
        $notes = Note::find(request('ids'));

        foreach ($notes as $note) {
            $note->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
