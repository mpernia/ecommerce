@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.profile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.profiles.update", [$profile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.profile.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $profile->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_surname">{{ trans('cruds.profile.fields.first_surname') }}</label>
                <input class="form-control {{ $errors->has('first_surname') ? 'is-invalid' : '' }}" type="text" name="first_surname" id="first_surname" value="{{ old('first_surname', $profile->first_surname) }}">
                @if($errors->has('first_surname'))
                    <span class="text-danger">{{ $errors->first('first_surname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.first_surname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="second_surname">{{ trans('cruds.profile.fields.second_surname') }}</label>
                <input class="form-control {{ $errors->has('second_surname') ? 'is-invalid' : '' }}" type="text" name="second_surname" id="second_surname" value="{{ old('second_surname', $profile->second_surname) }}">
                @if($errors->has('second_surname'))
                    <span class="text-danger">{{ $errors->first('second_surname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.second_surname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birthday">{{ trans('cruds.profile.fields.birthday') }}</label>
                <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday', $profile->birthday) }}">
                @if($errors->has('birthday'))
                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.birthday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.profile.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $profile->mobile) }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avatar">{{ trans('cruds.profile.fields.avatar') }}</label>
                <div class="needsclick dropzone {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar-dropzone">
                </div>
                @if($errors->has('avatar'))
                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.avatar_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.avatarDropzone = {
    url: '{{ route('backoffice.profiles.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="avatar"]').remove()
      $('form').append('<input type="hidden" name="avatar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="avatar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($profile) && $profile->avatar)
      var file = {!! json_encode($profile->avatar) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="avatar" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection