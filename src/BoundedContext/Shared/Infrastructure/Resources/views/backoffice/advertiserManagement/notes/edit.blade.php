@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.note.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.notes.update", [$note->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="store_id">{{ trans('cruds.note.fields.store') }}</label>
                <select class="form-control select2 {{ $errors->has('store') ? 'is-invalid' : '' }}" name="store_id" id="store_id" required>
                    @foreach($stores as $id => $entry)
                        <option value="{{ $id }}" {{ (old('store_id') ? old('store_id') : $note->store->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('store'))
                    <span class="text-danger">{{ $errors->first('store') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.store_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note_text">{{ trans('cruds.note.fields.note_text') }}</label>
                <textarea class="form-control {{ $errors->has('note_text') ? 'is-invalid' : '' }}" name="note_text" id="note_text" required>{{ old('note_text', $note->note_text) }}</textarea>
                @if($errors->has('note_text'))
                    <span class="text-danger">{{ $errors->first('note_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.note_text_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
