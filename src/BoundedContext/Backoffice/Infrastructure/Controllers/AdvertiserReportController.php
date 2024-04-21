<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Store;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Transaction;
use Illuminate\Http\Request;

class AdvertiserReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with('store')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->orderBy('transaction_date', 'desc');

        if ($request->has('store')) {
            $query->where('store_id', $request->store);
        }

        $transactions = $query->get();

        $entries = [];
        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = Carbon::createFromFormat(config('setting.date_format'), $row->transaction_date)->format('Y-m');
                if (! isset($entries[$date])) {
                    $entries[$date] = [];
                }
                $currency = $row->currency->code;
                if (! isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income'   => 0,
                        'expenses' => 0,
                        'fees'     => 0,
                        'total'    => 0,
                    ];
                }
                $income   = 0;
                $expenses = 0;
                $fees     = 0;
                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }
                if (! is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }

                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
            }
        }
        $stores = Store::pluck('name', 'id')->prepend('--- ' . trans('cruds.advertiserReport.reports.allStores') . ' ---', '');
        if ($request->has('store')) {
            $currentStore = $request->get('store');
        } else {
            $currentStore = '';
        }

        return view('backoffice.advertiserManagement.reports.index', compact(
            'entries',
            'stores',
            'currentStore'
        ));
    }
}
