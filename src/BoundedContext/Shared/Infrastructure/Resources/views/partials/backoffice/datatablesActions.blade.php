@can($viewGate)
    <a class="btn btn-xs btn-primary btn-action" href="{{ route('backoffice.' . $crudRoutePart . '.show', $row->getRouteKey()) }}">
        <i class="fas fa-folder"></i> {{ trans('global.view') }}
    </a>
@endcan
@can($editGate)
    <a class="btn btn-xs btn-info btn-action" href="{{ route('backoffice.' . $crudRoutePart . '.edit', $row->getRouteKey()) }}">
        <i class="fas fa-pencil-alt"></i> {{ trans('global.edit') }}
    </a>
@endcan
@can($deleteGate)
    <form action="{{ route('backoffice.' . $crudRoutePart . '.destroy', $row->getRouteKey()) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-xs btn-danger btn-action"><i class="fas fa-trash"></i> {{ trans('global.delete') }}</button>
    </form>
@endcan

