@extends('layouts.front_end')

@section('title') {{('Password Email')}} @endsection

@section('header')
    @include('inc.header')
@endsection

@section('content')

    <div class="tt-loginpages-wrapper">
        <div class="tt-loginpages">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-default" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                </div>
            </form>
        </div>
    </div>
@endsection
