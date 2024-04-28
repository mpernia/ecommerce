@extends('layouts.backoffice')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Permission">
                <thead>
                <tr>
                    <th class="td-checkbox">

                    </th>
                    <th>
                        {{ trans('cruds.permission.fields.id') }}
                    </th>
                    <th class="td-lg">
                        {{ trans('cruds.permission.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.permission.fields.key') }}
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
            @can('permission_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('backoffice.permissions.massDestroy') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
                        var ids = $.map(dt.rows({selected: true}).data(), function (entry) {
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
                                data: {ids: ids, _method: 'DELETE'}
                            }).done(function () {
                                location.reload()
                            })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan
            @can('permission_create')
                let createButtonTrans = '{{ trans('global.add') }}';
                let createButton = {
                    text: createButtonTrans,
                    className: ['btn-success', 'btn'],
                    action: function () {
                        $(location).attr('href', "{{ route('backoffice.permissions.create') }}");
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
                ajax: "{{ route('backoffice.permissions.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id', visible: false},
                    {data: 'title', name: 'title'},
                    {data: 'key', name: 'key'},
                    {data: 'actions', name: '{{ trans('global.actions') }}', visible: false}
                ],
                orderCellsTop: true,
                order: [[2, 'asc']],
                pageLength: 100,
            };
            let table = $('.datatable-Permission').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
