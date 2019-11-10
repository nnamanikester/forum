@extends('layouts.front_end')


@section('title') {{('Account Verification')}} @endsection


@section('header')
    @include('inc.header')
@endsection


@section('content')



        <div class="tt-loginpages-wrapper">
            <div class="tt-loginpages">

                <div class="">{{ __('Verify Your Email Address') }}</div>


                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-block">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>

@endsection
