@extends('layouts.backoffice')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.knownHost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-KnownHost">
            <thead>
                <tr>
                    <th class="td-checkbox">

                    </th>
                    <th>
                        {{ trans('cruds.knownHost.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.knownHost.fields.ip_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.knownHost.fields.domain') }}
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
        @can('known_host_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('backoffice.known-hosts.massDestroy') }}",
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
        @can('known_host_create')
            let createButtonTrans = '{{ trans('global.add') }}';
            let createButton = {
                text: createButtonTrans,
                className: ['btn-success', 'btn'],
                action: function () {
                    $(location).attr('href', "{{ route('backoffice.known-hosts.create') }}");
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
            ajax: "{{ route('backoffice.known-hosts.index') }}",
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'id', name: 'id', visible: false },
                { data: 'ip_address', name: 'ip_address' },
                { data: 'domain', name: 'domain' },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            orderCellsTop: true,
            order: [[ 3, 'asc' ]],
            pageLength: 100,
        };
        let table = $('.datatable-KnownHost').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });

</script>
@endsection
