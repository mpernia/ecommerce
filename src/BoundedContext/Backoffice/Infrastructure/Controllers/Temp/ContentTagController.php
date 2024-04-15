<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\ContentTag;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyContentTagRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreContentTagRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateContentTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContentTagController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('content_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContentTag::query()->select(sprintf('%s.*', (new ContentTag)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'content_tag_show';
                $editGate      = 'content_tag_edit';
                $deleteGate    = 'content_tag_delete';
                $crudRoutePart = 'content-tags';

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
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('backoffice.temp.contentTags.index');
    }

    public function create()
    {
        abort_if(Gate::denies('content_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.contentTags.create');
    }

    public function store(StoreContentTagRequest $request)
    {
        $contentTag = ContentTag::create($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function edit(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.contentTags.edit', compact('contentTag'));
    }

    public function update(UpdateContentTagRequest $request, ContentTag $contentTag)
    {
        $contentTag->update($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function show(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.contentTags.show', compact('contentTag'));
    }

    public function destroy(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentTagRequest $request)
    {
        $contentTags = ContentTag::find(request('ids'));

        foreach ($contentTags as $contentTag) {
            $contentTag->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
