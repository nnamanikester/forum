@extends('layouts.front_end')


@section('title') {{('Category')}} @endsection


{{--@section('header')--}}
    {{--@if(Auth::check())--}}
        {{--@include('inc.header_logged_in')--}}
    {{--@else--}}
        {{--@include('inc.header')--}}
    {{--@endif--}}
{{--@endsection--}}


@section('content')
        <div class="tt-catSingle-title">
            <div class="tt-innerwrapper tt-row">
                <div class="tt-col-left">
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-color01 tt-badge">politics</span></a></li>
                    </ul>
                </div>
                <div class="ml-left tt-col-right">
                    <div class="tt-col-item">
                        <h2 class="tt-value">Threads - 1,245</h2>
                    </div>
                    <div class="tt-col-item">
                        <a href="#" class="tt-btn-icon">
                            <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                        </a>
                    </div>
                    <div class="tt-col-item">
                        <div class="tt-search">
                            <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <form class="search-wrapper">
                                <div class="search-form">
                                    <input type="text" class="tt-search__input" placeholder="Search in politics">
                                    <button class="tt-search__btn" type="submit">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                    <button class="tt-search__close">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-cancel"></use>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tt-innerwrapper">
                Lets discuss about whats happening around the world politics.
            </div>
            <div class="tt-innerwrapper">
                <h6 class="tt-title">OTHER CATEGORIES</h6>
                <ul class="tt-list-badge">
                    <li><a href="#"><span class="tt-badge">world politics</span></a></li>
                    <li><a href="#"><span class="tt-badge">human rights</span></a></li>
                    <li><a href="#"><span class="tt-badge">trump</span></a></li>
                    <li><a href="#"><span class="tt-badge">climate change</span></a></li>
                    <li><a href="#"><span class="tt-badge">foreign policy</span></a></li>
                    <li><a href="#"><span class="tt-badge">world politics</span></a></li>
                    <li><a href="#"><span class="tt-badge">human rights</span></a></li>
                    <li><a href="#"><span class="tt-badge">trump</span></a></li>
                    <li><a href="#"><span class="tt-badge">climate change</span></a></li>
                </ul>
            </div>
        </div>
        <div class="tt-topic-list">
            <div class="tt-list-header">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Replies</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
            </div>

            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-ava-c"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                            Review Queue Changes for VideoHive & PhotoDune
                        </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-11">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge">politics</span></a></li>
                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                            </ul>
                        </div>
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value">1d</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category"><span class="tt-color01 tt-badge">politics</span></div>
                <div class="tt-col-value  hide-mobile">308</div>
                <div class="tt-col-value tt-color-select  hide-mobile">660</div>
                <div class="tt-col-value  hide-mobile">8.3k</div>
                <div class="tt-col-value hide-mobile">1d</div>
            </div>



            <div class="tt-row-btn">
                <button type="button" class="btn-icon js-topiclist-showmore">
                    {{--PAGINATION WILL GO HERE--}}
                    <svg class="tt-icon">
                        <use xlink:href="#icon-load_lore_icon"></use>
                    </svg>
                </button>
            </div>
        </div>



@endsection
