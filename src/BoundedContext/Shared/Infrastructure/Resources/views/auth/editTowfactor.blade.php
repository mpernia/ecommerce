@extends('layouts.backoffice')
@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.two_factor.title') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("profile.toggleTwoFactor") }}">
                        @csrf
                        <div class="form-group">
                            <p>{{ trans('global.two_factor.information') }} </p>
                            <button class="btn {!! !auth()->user()->two_factor ? 'btn-success' : 'btn-secondary' !!}" type="submit">
                                {{ auth()->user()->two_factor ? trans('global.two_factor.disable') : trans('global.two_factor.enable') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
