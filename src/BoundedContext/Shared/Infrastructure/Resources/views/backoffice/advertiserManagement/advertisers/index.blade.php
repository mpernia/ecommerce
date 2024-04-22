@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.advertiser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Advertiser">
            <thead>
                <tr>
                    <th class="td-checkbox">

                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.company') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.website') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.skype') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.advertiser.fields.status') }}
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
        @can('advertiser_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('backoffice.advertisers.massDestroy') }}",
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
        @can('advertiser_create')
            let createButtonTrans = '{{ trans('global.add') }}';
            let createButton = {
                text: createButtonTrans,
                className: ['btn-success', 'btn'],
                action: function () {
                    $(location).attr('href', "{{ route('backoffice.advertisers.create') }}");
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
            ajax: "{{ route('backoffice.advertisers.index') }}",
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'id', name: 'id', visible: false },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'company', name: 'company' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'website', name: 'website' },
                { data: 'skype', name: 'skype' },
                { data: 'country', name: 'country' },
                { data: 'status_name', name: 'status.name' },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            orderCellsTop: true,
            order: [[ 4, 'asc' ]],
            pageLength: 100,
        };
        let table = $('.datatable-Advertiser').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
