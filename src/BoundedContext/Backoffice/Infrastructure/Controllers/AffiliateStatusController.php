<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AffiliateStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyAffiliateStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreAffiliateStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateAffiliateStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AffiliateStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('affiliate_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AffiliateStatus::query()->select(sprintf('%s.*', (new AffiliateStatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'affiliate_status_show';
                $editGate      = 'affiliate_status_edit';
                $deleteGate    = 'affiliate_status_delete';
                $crudRoutePart = 'affiliate-statuses';

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

        return view('backoffice.temp.affiliateStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('affiliate_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.affiliateStatuses.create');
    }

    public function store(StoreAffiliateStatusRequest $request)
    {
        $affiliateStatus = AffiliateStatus::create($request->all());

        return redirect()->route('backoffice.affiliate-statuses.index');
    }

    public function edit(AffiliateStatus $affiliateStatus)
    {
        abort_if(Gate::denies('affiliate_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.affiliateStatuses.edit', compact('affiliateStatus'));
    }

    public function update(UpdateAffiliateStatusRequest $request, AffiliateStatus $affiliateStatus)
    {
        $affiliateStatus->update($request->all());

        return redirect()->route('backoffice.affiliate-statuses.index');
    }

    public function show(AffiliateStatus $affiliateStatus)
    {
        abort_if(Gate::denies('affiliate_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.affiliateStatuses.show', compact('affiliateStatus'));
    }

    public function destroy(AffiliateStatus $affiliateStatus)
    {
        abort_if(Gate::denies('affiliate_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliateStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffiliateStatusRequest $request)
    {
        $affiliateStatuses = AffiliateStatus::find(request('ids'));

        foreach ($affiliateStatuses as $affiliateStatus) {
            $affiliateStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
