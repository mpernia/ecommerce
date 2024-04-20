<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\KnownHost;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\MassDestroyKnownHostRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\StoreKnownHostRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\UpdateKnownHostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KnownHostController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('known_host_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KnownHost::query()->select(sprintf('%s.*', (new KnownHost)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'known_host_show';
                $editGate      = 'known_host_edit';
                $deleteGate    = 'known_host_delete';
                $crudRoutePart = 'known-hosts';

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
            $table->editColumn('ip_address', function ($row) {
                return $row->ip_address ? $row->ip_address : '';
            });
            $table->editColumn('domain', function ($row) {
                return $row->domain ? $row->domain : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('backoffice.affiliateManagement.knownHosts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('known_host_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.affiliateManagement.knownHosts.create');
    }

    public function store(StoreKnownHostRequest $request)
    {
        $knownHost = KnownHost::create($request->all());

        return redirect()->route('backoffice.known-hosts.index');
    }

    public function edit(KnownHost $knownHost)
    {
        abort_if(Gate::denies('known_host_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.affiliateManagement.knownHosts.edit', compact('knownHost'));
    }

    public function update(UpdateKnownHostRequest $request, KnownHost $knownHost)
    {
        $knownHost->update($request->all());

        return redirect()->route('backoffice.known-hosts.index');
    }

    public function show(KnownHost $knownHost)
    {
        abort_if(Gate::denies('known_host_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.affiliateManagement.knownHosts.show', compact('knownHost'));
    }

    public function destroy(KnownHost $knownHost)
    {
        abort_if(Gate::denies('known_host_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knownHost->delete();

        return back();
    }

    public function massDestroy(MassDestroyKnownHostRequest $request)
    {
        $knownHosts = KnownHost::find(request('ids'));

        foreach ($knownHosts as $knownHost) {
            $knownHost->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
