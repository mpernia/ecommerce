<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\ContentCategory;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyContentCategoryRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreContentCategoryRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateContentCategoryRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContentCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('content_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContentCategory::with(['parent'])->select(sprintf('%s.*', (new ContentCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'content_category_show';
                $editGate      = 'content_category_edit';
                $deleteGate    = 'content_category_delete';
                $crudRoutePart = 'content-categories';

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
            $table->editColumn('icon', function ($row) {
                return $row->icon ? $row->icon : '';
            });
            $table->addColumn('parent_name', function ($row) {
                return $row->parent ? $row->parent->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'parent']);

            return $table->make(true);
        }

        return view('backoffice.temp.contentCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('content_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = ContentCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.contentCategories.create', compact('parents'));
    }

    public function store(StoreContentCategoryRequest $request)
    {
        $contentCategory = ContentCategory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contentCategory->id]);
        }

        return redirect()->route('backoffice.content-categories.index');
    }

    public function edit(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = ContentCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contentCategory->load('parent');

        return view('backoffice.temp.contentCategories.edit', compact('contentCategory', 'parents'));
    }

    public function update(UpdateContentCategoryRequest $request, ContentCategory $contentCategory)
    {
        $contentCategory->update($request->all());

        return redirect()->route('backoffice.content-categories.index');
    }

    public function show(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentCategory->load('parent');

        return view('backoffice.temp.contentCategories.show', compact('contentCategory'));
    }

    public function destroy(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentCategoryRequest $request)
    {
        $contentCategories = ContentCategory::find(request('ids'));

        foreach ($contentCategories as $contentCategory) {
            $contentCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('content_category_create') && Gate::denies('content_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ContentCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
