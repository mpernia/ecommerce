@extends('layouts.backoffice')
@section('content')
@can('preference_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backoffice.preferences.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.preference.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.preference.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Preference">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.preference.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.preference.fields.sort_product_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.preference.fields.notify_method') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($preferences as $key => $preference)
                        <tr data-entry-id="{{ $preference->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $preference->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Preference::SORT_PRODUCT_BY_SELECT[$preference->sort_product_by] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Preference::NOTIFY_METHOD_SELECT[$preference->notify_method] ?? '' }}
                            </td>
                            <td>
                                @can('preference_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('backoffice.preferences.show', $preference->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('preference_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('backoffice.preferences.edit', $preference->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('preference_delete')
                                    <form action="{{ route('backoffice.preferences.destroy', $preference->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('preference_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backoffice.preferences.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Preference:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection