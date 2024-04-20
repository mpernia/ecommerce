<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Currency;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\IncomeSource;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Store;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Transaction;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\TransactionType;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyTransactionRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreTransactionRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Transaction::with(['project', 'transaction_type', 'income_source', 'currency', 'created_by'])->select(sprintf('%s.*', (new Transaction)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'transaction_show';
                $editGate      = 'transaction_edit';
                $deleteGate    = 'transaction_delete';
                $crudRoutePart = 'transactions';

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
                return $row->project ? $row->project->name : '';
            });

            $table->addColumn('transaction_type_name', function ($row) {
                return $row->transaction_type ? $row->transaction_type->name : '';
            });

            $table->addColumn('income_source_name', function ($row) {
                return $row->income_source ? $row->income_source->name : '';
            });

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->addColumn('currency_name', function ($row) {
                return $row->currency ? $row->currency->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'project', 'transaction_type', 'income_source', 'currency']);

            return $table->make(true);
        }

        return view('backoffice.advertiserManagement.transactions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.advertiserManagement.transactions.create', compact('currencies', 'income_sources', 'stores', 'transaction_types'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return redirect()->route('backoffice.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('project', 'transaction_type', 'income_source', 'currency', 'created_by');

        return view('backoffice.advertiserManagement.transactions.edit', compact('currencies', 'income_sources', 'stores', 'transaction', 'transaction_types'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('backoffice.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('project', 'transaction_type', 'income_source', 'currency', 'created_by');

        return view('backoffice.advertiserManagement.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        $transactions = Transaction::find(request('ids'));

        foreach ($transactions as $transaction) {
            $transaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
