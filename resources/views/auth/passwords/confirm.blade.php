@extends('layouts.front_end')

@section('title') {{('Confirm Password')}} @endsection

@section('header')
    @include('inc.header_logged_in')
@endsection

@section('content')

    <div class="tt-loginpages-wrapper">
        <div class="tt-loginpages">

            {{ __('Please confirm your password before continuing.') }}

            <form class="form-default" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="tt-underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                </div>
            </form>
        </div>
    </div>

@endsection
