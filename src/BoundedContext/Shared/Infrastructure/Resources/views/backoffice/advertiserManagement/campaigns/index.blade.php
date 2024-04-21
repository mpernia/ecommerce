@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.campaign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Campaign">
            <thead>
                <tr>
                    <th class="td-checkbox">

                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.is_active') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.url') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.utm_source') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.utm_medium') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.utm_campaign') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.utm_term') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.utm_content') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.pay_per_clic') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.cost_per_lead') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.cost_per_acquisition') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.cost_per_clic') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.persent_per_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.product') }}
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
        @can('campaign_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('backoffice.campaigns.massDestroy') }}",
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
        @can('campaign_create')
            let createButtonTrans = '{{ trans('global.add') }}';
            let createButton = {
                text: createButtonTrans,
                className: ['btn-success', 'btn'],
                action: function () {
                    $(location).attr('href', "{{ route('backoffice.campaigns.create') }}");
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
            ajax: "{{ route('backoffice.campaigns.index') }}",
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'id', name: 'id', visible: false },
                { data: 'name', name: 'name' },
                { data: 'is_active', name: 'is_active' },
                { data: 'url', name: 'url' },
                { data: 'utm_source', name: 'utm_source' },
                { data: 'utm_medium', name: 'utm_medium' },
                { data: 'utm_campaign', name: 'utm_campaign' },
                { data: 'utm_term', name: 'utm_term' },
                { data: 'utm_content', name: 'utm_content' },
                { data: 'pay_per_clic', name: 'pay_per_clic' },
                { data: 'cost_per_lead', name: 'cost_per_lead' },
                { data: 'cost_per_acquisition', name: 'cost_per_acquisition' },
                { data: 'cost_per_clic', name: 'cost_per_clic' },
                { data: 'persent_per_sale', name: 'persent_per_sale' },
                { data: 'product', name: 'products.name' },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        };
        let table = $('.datatable-Campaign').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
