@extends('layouts.backoffice')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backoffice.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.product.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.reference') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.tag') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.carousel') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.is_active') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.availability') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.brand') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backoffice.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('backoffice.products.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'price', name: 'price' },
{ data: 'reference', name: 'reference' },
{ data: 'category', name: 'categories.name' },
{ data: 'tag', name: 'tags.name' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'carousel', name: 'carousel', sortable: false, searchable: false },
{ data: 'is_active', name: 'is_active' },
{ data: 'availability', name: 'availability' },
{ data: 'brand', name: 'brand' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Product').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection