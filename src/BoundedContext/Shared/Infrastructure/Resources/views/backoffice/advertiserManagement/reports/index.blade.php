@extends('layouts.backoffice')
@section('content')
<h3 class="page-title">{{ trans('cruds.advertiserReport.title') }}</h3>

<form action="" method="GET">
    <div class="row">
        <div class="col-xs-6 col-md-4 form-group">
            <label class="control-label" for="store">{{ trans('cruds.advertiserReport.title_singular') }}</label>
            <select name="project" class="form-control">
                @foreach($stores as $key => $value)
                    <option value="{{ $key }}" @if ($key==$currentStore) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-4">
            <label class="control-label">&nbsp;</label><br>
            <input class="btn btn-primary" type="submit" value="{{ trans('global.submit') }}">
        </div>
    </div>
</form>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.advertiserReport.title_singular') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed datatable">
                <thead>
                    <tr>
                        <th>{{ trans('cruds.advertiserReport.reports.month') }}</th>
                        <th>{{ trans('cruds.advertiserReport.reports.income') }}</th>
                        <th>{{ trans('cruds.advertiserReport.reports.expenses') }}</th>
                        <th>{{ trans('cruds.advertiserReport.reports.fees') }}</th>
                        <th>{{ trans('cruds.advertiserReport.reports.total') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($entries as $date => $info)
                        @foreach($info as $currency => $row)
                            <tr>
                                <td>{{ $date }}</td>
                                <td>{{ number_format($row['income'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['expenses'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['fees'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['total'],2) }} {{ $currency }}</td>
                            </tr>
                            <?php $date = ''; ?>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>



@endsection
