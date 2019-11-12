@extends('layouts.front_end')


@section('title') {{('Login')}} @endsection


{{--@section('header')--}}
    {{--@if(Auth::check())--}}
        {{--@include('inc.header_logged_in')--}}
    {{--@else--}}
        {{--@include('inc.header')--}}
    {{--@endif--}}
{{--@endsection--}}

@section('content')

    <div class="tt-loginpages-wrapper">
            <div class="tt-loginpages">
                <a href="index.html" class="tt-block-title">
                    <img src="images/logo.png" alt="">
                    <div class="tt-title">
                        Welcome to Forum19
                    </div>
                    <div class="tt-description">
                        Log into your account to unlock true power of community.
                    </div>
                </a>
                <form class="form-default">
                    <div class="form-group">
                        <label for="loginUserName">Username</label>
                        <input type="text" name="name" class="form-control" id="loginUserName" placeholder="azyrusmax">
                    </div>
                    <div class="form-group">
                        <label for="loginUserPassword">Password</label>
                        <input type="password" name="name" class="form-control" id="loginUserPassword" placeholder="************">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="settingsCheckBox01" name="checkbox">
                                    <label for="settingsCheckBox01">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        <span class="tt-text">Remember me</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <a href="#" class="tt-underline">Forgot Password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-secondary btn-block">Log in</a>
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
                    <p>Don’t have an account? <a href="#" class="tt-underline">Signup here</a></p>
                    <div class="tt-notes">
                        By Logging in, signing in or continuing, I agree to
                        Forum19’s <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                    </div>
                </form>
            </div>
        </div>

@endsection