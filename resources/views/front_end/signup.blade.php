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
                        Join the forum to unlock true power of community.
                    </div>
                </a>
                <form class="form-default">
                    <div class="form-group">
                        <label for="loginUserName">Username</label>
                        <input type="text" name="name" class="form-control" id="loginUserName" placeholder="azyrusmax">
                    </div>
                    <div class="form-group">
                        <label for="loginUserEmail">Email</label>
                        <input type="text" name="name" class="form-control" id="loginUserEmail" placeholder="Sample@sample.com">
                    </div>
                    <div class="form-group">
                        <label for="loginUserPassword">Password</label>
                        <input type="password" name="name" class="form-control" id="loginUserPassword" placeholder="************">
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-secondary btn-block">Create my account</a>
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
                    <p>Already have an account? <a href="#" class="tt-underline">Login here</a></p>
                    <div class="tt-notes">
                        By signing up, signing in or continuing, I agree to
                        Forum19’s <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                    </div>
                </form>
            </div>
        </div>

@endsection