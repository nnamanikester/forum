@extends('layouts.front_end')

@section('title') Forum Users @endsection


{{--@section('header')--}}
{{--@include('inc.header_logged_in')--}}
{{--@endsection--}}

@section('content')

<div class="" id="">
    <div class="tt-layout-tab">
        <div class="tt-wrapper-inner">
            <h2 class="tt-title">
                All Forum Users
            </h2>
            These are list of all the users we have in Forum
            <h3 class="tt-title">
                Admins
            </h3>
            <div class="tt-list-avatar">
                <div class="row">

                    @if(count($admins) > 0)
                        @foreach($admins as $admin)
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="{{ route('user.profile', $admin->username) }}" class="tt-avatar">
                                    <div class="tt-col-icon">
                                        <img width="40" height="40" style="border-radius: 50%;" src="{{$admin->photo ? $admin->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title">{{ Str::title($admin->name) }}</h6>
                                        <div class="tt-value">{{ '@' . $admin->username }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else

                        <h5>
                            No Admin
                        </h5>

                    @endif

                </div>
            </div>

            <h4 class="tt-title">
                Moderators
            </h4>
            <div class="tt-list-avatar">
                <div class="row">

                    @if(count($moderators) > 0)
                        @foreach($moderators as $moderator)
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="{{ route('user.profile', $moderator->username) }}" class="tt-avatar">
                                    <div class="tt-col-icon">
                                        <img width="40" height="40" style="border-radius: 50%;" src="{{$moderator->photo ? $moderator->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title">{{ Str::title($moderator->name) }}</h6>
                                        <div class="tt-value">{{ '@' . $moderator->username }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else

                        <h5>
                            No Moderator
                        </h5>

                    @endif

                </div>
            </div>

            <h4 class="tt-title">
                Subscribers
            </h4>
            <div class="tt-list-avatar">
                <div class="row">

                    @if(count($subscribers) > 0)
                        @foreach($subscribers as $subscriber)
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="{{ route('user.profile', $subscriber->username) }}" class="tt-avatar">
                                    <div class="tt-col-icon">
                                        <img width="40" height="40" style="border-radius: 50%;" src="{{$subscriber->photo ? $subscriber->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title">{{ Str::title($subscriber->name) }}</h6>
                                        <div class="tt-value">{{ '@' . $subscriber->username }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else

                        <h5>
                            No Subscriber
                        </h5>

                    @endif


                    <div class="tt-row-btn">
                        {{--PAGINATION GOES HERE--}}
                        {{$subscribers->links()}}
                    </div>


                </div>
            </div>



        </div>

    </div>
</div>

@endsection