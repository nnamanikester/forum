@extends('layouts.front_end')

@section('title') {{('Register')}} @endsection

@section('header')
    @include('inc.header')
@endsection

@section('content')

    <div class="tt-loginpages-wrapper">
        <div class="tt-loginpages">
            <a href="{{route('fe.home')}}" class="tt-block-title">
                <img src="images/logo.png" alt="">
                <div class="tt-title">
                    Welcome to Forum19
                </div>
                <div class="tt-description">
                    Join the forum to unlock true power of community.
                </div>
            </a>
            <form class="form-default" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Full Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password" >{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-secondary btn-block">
                        {{ __('Create My Account') }}
                    </button>
                </div>


                <p>Or signup with social network</p>
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
                <p>Already have an account? <a href="{{route('login')}}" class="tt-underline">Login here</a></p>
                <div class="tt-notes">
                    By signing up, signing in or continuing, I agree to
                    Forum’s <a href="{{route('fe.page', 'terms')}}" class="tt-underline">Terms of Use</a> and <a href="{{route('fe.page', 'privacy')}}" class="tt-underline">Privacy Policy.</a>
                </div>

            </form>
        </div>
    </div>
@endsection
