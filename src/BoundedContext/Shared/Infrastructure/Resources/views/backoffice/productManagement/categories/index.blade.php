@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.productCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ProductCategory">
            <thead>
                <tr>
                    <th class="td-checkbox">

                    </th>
                    <th>
                        {{ trans('cruds.productCategory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.productCategory.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.productCategory.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.productCategory.fields.photo') }}
                    </th>
                    <th class="td-action">
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
        @can('product_category_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('backoffice.product-categories.massDestroy') }}",
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
                        data: { ids: ids, _method: 'DELETE' }
                        })
                        .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
        @endcan
        @can('product_category_create')
            let createButtonTrans = '{{ trans('global.add') }}';
            let createButton = {
                text: createButtonTrans,
                className: ['btn-success', 'btn'],
                action: function () {
                    $(location).attr('href', "{{ route('backoffice.product-categories.create') }}");
                }
            }
            dtButtons.push(createButton)
        @endcan
        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('backoffice.product-categories.index') }}",
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'id', name: 'id', visible: false },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'photo', name: 'photo', sortable: false, searchable: false },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            orderCellsTop: true,
            order: [[ 2, 'asc' ]],
            pageLength: 100,
        };
        let table = $('.datatable-ProductCategory').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
