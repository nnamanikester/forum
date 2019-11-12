@extends('layouts.front_end')

@section('title') {{('Home')}} @endsection


{{--@section('header')--}}
    {{--@if(Auth::check())--}}
        {{--@include('inc.header_logged_in')--}}
    {{--@else--}}
        {{--@include('inc.header')--}}
    {{--@endif--}}
{{--@endsection--}}


@section('content')


    <div class="tt-topic-list">

        {{--TABLE TITLE HEADS--}}
        <div class="tt-list-header">
            <div class="tt-col-topic">Topic</div>
            <div class="tt-col-category">Category</div>
            <div class="tt-col-value hide-mobile">Likes</div>
            <div class="tt-col-value hide-mobile">Replies</div>
            <div class="tt-col-value hide-mobile">Views</div>
            <div class="tt-col-value">Activity</div>
        </div>
        {{--//TABLE TITLE HEADS END--}}

        {{--NOTIFICATION--}}
        <div class="tt-topic-alert tt-alert-default" role="alert">
            <a href="#" target="_blank">4 new posts</a> are added recently, click here to load them.
        </div>
        {{--//NOTIFICATION ENDS--}}


        {{--NEW TOPICS NOTIFICATION--}}
        <div class="tt-item tt-itemselect">
            <div class="tt-col-avatar">
                {{--IMMAGE WILL BE HERE--}}
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-pinned"></use>
                        </svg>
                        Halloween Costume Contest 2018
                    </a></h6>
                <div class="row align-items-center no-gutters">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge">politics</span></a></li>
                            <li><a href="#"><span class="tt-badge">contests</span></a></li>
                            <li><a href="#"><span class="tt-badge">authors</span></a></li>
                        </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                        <div class="tt-value">1h</div>
                    </div>
                </div>
            </div>
            <div class="tt-col-category"><span class="tt-color01 tt-badge">politics</span></div>
            <div class="tt-col-value hide-mobile">985</div>
            <div class="tt-col-value tt-color-select hide-mobile">502</div>
            <div class="tt-col-value hide-mobile">15.1k</div>
            <div class="tt-col-value hide-mobile">1h</div>
        </div>





        <div class="tt-item tt-itemselect">
            <div class="tt-col-avatar">
                <svg class="tt-icon">
                    <use xlink:href="#icon-ava-l"></use>
                </svg>
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-locked"></use>
                        </svg>
                        We’re removing Envato Credits from Market
                    </a></h6>
                <div class="row align-items-center no-gutters  hide-desktope">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="{{route('fe.category')}}"><span class="tt-color02 tt-badge">video</span></a></li>
                        </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                        <div class="tt-value">2h</div>
                    </div>
                </div>
            </div>
            <div class="tt-col-category"><span class="tt-color02 tt-badge">video</span></div>
            <div class="tt-col-value hide-mobile">584</div>
            <div class="tt-col-value tt-color-select  hide-mobile">35</div>
            <div class="tt-col-value hide-mobile">1.3k</div>
            <div class="tt-col-value hide-mobile">2h</div>
        </div>





        <div class="tt-item tt-itemselect">
            <div class="tt-col-avatar">
                <svg class="tt-icon">
                    <use xlink:href="#icon-ava-d"></use>
                </svg>
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                        Web Hosting Packages for ThemeForest WordPress
                    </a></h6>
                <div class="row align-items-center no-gutters">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a></li>
                            <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                            <li><a href="#"><span class="tt-badge">elements</span></a></li>
                        </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                        <div class="tt-value">2h</div>
                    </div>
                </div>
            </div>
            <div class="tt-col-category"><span class="tt-color03 tt-badge">exchange</span></div>
            <div class="tt-col-value  hide-mobile">401</div>
            <div class="tt-col-value tt-color-select  hide-mobile">975</div>
            <div class="tt-col-value  hide-mobile">12.6k</div>
            <div class="tt-col-value hide-mobile">2h</div>
        </div>

        {{--NEW TOPIC NOTIFICATION ENDS--}}




        {{--LIST OF TOPICS STARTS--}}
        <div class="tt-item">
            <div class="tt-col-avatar">
                {{--IMMAGE WILL BE HERE--}}
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                        Review Queue Changes for VideoHive & PhotoDune
                    </a></h6>
                <div class="row align-items-center no-gutters">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="{{route('fe.category')}}"><span class="tt-color04 tt-badge">pets</span></a></li>
                            <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                            <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                        </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                        <div class="tt-value">1d</div>
                    </div>
                </div>
            </div>
            <div class="tt-col-category"><span class="tt-color04 tt-badge">pets</span></div>
            <div class="tt-col-value  hide-mobile">308</div>
            <div class="tt-col-value tt-color-select  hide-mobile">660</div>
            <div class="tt-col-value  hide-mobile">8.3k</div>
            <div class="tt-col-value hide-mobile">1d</div>
        </div>
        {{--LIST OF TOPICS ENDS--}}



        {{--LOGIN AND SIGNUP ADVERT--}}

        <div class="tt-item tt-item-popup">
            <div class="tt-col-avatar">
                <svg class="tt-icon">
                    <use xlink:href="#icon-ava-f"></use>
                </svg>
            </div>
            <div class="tt-col-message">
                Looks like you are new here. Register for free, learn and contribute.
            </div>
            <div class="tt-col-btn">
                <button type="button" class="btn btn-primary">Log in</button>
                <button type="button" class="btn btn-secondary">Sign up</button>
                <button type="button" class="btn-icon">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-cancel"></use>
                    </svg>
                </button>
            </div>
        </div>

        {{--LOGIN AND SIGNUP ADVERT--}}




        {{--PAGINATION STARTS HERE--}}
        <div class="tt-row-btn">
            <button type="button" class="btn-icon js-topiclist-showmore">
                {{--PAGINATION WILL BE HERE--}}
            </button>
        </div>
        {{--PAGINATION ENDS HERE--}}




    </div>


@endsection