<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\TransactionType;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyTransactionTypeRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreTransactionTypeRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateTransactionTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('transaction_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TransactionType::query()->select(sprintf('%s.*', (new TransactionType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'transaction_type_show';
                $editGate      = 'transaction_type_edit';
                $deleteGate    = 'transaction_type_delete';
                $crudRoutePart = 'transaction-types';

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

        return view('backoffice.settingManagement.transactionTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.settingManagement.transactionTypes.create');
    }

    public function store(StoreTransactionTypeRequest $request)
    {
        $transactionType = TransactionType::create($request->all());

        return redirect()->route('backoffice.transaction-types.index');
    }

    public function edit(TransactionType $transactionType)
    {
        abort_if(Gate::denies('transaction_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.settingManagement.transactionTypes.edit', compact('transactionType'));
    }

    public function update(UpdateTransactionTypeRequest $request, TransactionType $transactionType)
    {
        $transactionType->update($request->all());

        return redirect()->route('backoffice.transaction-types.index');
    }

    public function show(TransactionType $transactionType)
    {
        abort_if(Gate::denies('transaction_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.settingManagement.transactionTypes.show', compact('transactionType'));
    }

    public function destroy(TransactionType $transactionType)
    {
        abort_if(Gate::denies('transaction_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactionType->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionTypeRequest $request)
    {
        $transactionTypes = TransactionType::find(request('ids'));

        foreach ($transactionTypes as $transactionType) {
            $transactionType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
