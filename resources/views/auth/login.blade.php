@extends('layouts.front_end')


@section('title') {{('Login')}} @endsection


@section('header')
    @include('inc.header')
@endsection

@section('content')

    <div class="tt-loginpages-wrapper">
        <div class="tt-loginpages">
            <a href="index.html" class="tt-block-title">
                <img src="images/logo.png" alt="">
                <div class="tt-title">
                    Welcome to Forum
                </div>
                <div class="tt-description">
                    Log into your account to unlock true power of community.
                </div>
            </a>

            <form class="form-default" method="POST" action="{{ route('login') }}">
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

                <div class="form-group r">
                    <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="checkbox-group">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label for="remember">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    <span class="tt-text">{{ __('Remember Me') }}</span>
                                </label>

                            </div>
                        </div>
                    </div>

                    <div class="col ml-auto text-right">
                        @if (Route::has('password.request'))
                            <a class="tt-underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Log in') }}
                        </button>
                </div>

                <p>Or login with social network</p>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <a href="#" class="btn btn-color01 btn-secondary btn-block">
                                <i>
                                    <svg class="icon">
                                        <use xlink:href="#facebook-f-brands"></use>
                                    </svg>
                                </i>
                                Facebook
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <a href="#" class="btn btn-color02 btn-block">
                                <i>
                                    <svg class="icon">
                                        <use xlink:href="#twitter-brands"></use>
                                    </svg>
                                </i>
                                Twitter
                            </a>
                        </div>
                    </div>
                </div>
                <p>Don’t have an account? <a href="{{route('register')}}" class="tt-underline">Register</a></p>
                <div class="tt-notes">
                    By Logging in, signing in or continuing, I agree to
                    Forum’s <a href="{{route('fe.page', 'terms')}}" class="tt-underline">Terms of Use</a> and <a href="{{route('fe.page', 'privacy')}}" class="tt-underline">Privacy Policy.</a>
                </div>

            </form>
        </div>
    </div>
@endsection
