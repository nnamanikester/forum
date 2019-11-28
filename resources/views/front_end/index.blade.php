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
            {{--<div class="tt-topic-alert tt-alert-default" role="alert">--}}
                {{--<a href="#" target="_blank">4 new posts</a> are added recently, click here to load them.--}}
            {{--</div>--}}
        {{--//NOTIFICATION ENDS--}}


        @if(count($featured_threads) > 0)

            <div class="tt-list-header">
                <h3>Featured Threads</h3>
            </div>

            {{--Featured TOPICS NOTIFICATION--}}

            @foreach($featured_threads as $featured)

                <div class="tt-item tt-itemselect">
                    <div class="tt-col-avatar">
                            <img width="40" height="40" style="border-radius: 50%;" src="{{$featured->user->photo ? $featured->user->photo->path : '/images/users/default.png'}}" alt="">
                    </div>
                    <div class="tt-col-description">
                        <h6 class="tt-title"><a href="{{route('fe.topic', $featured->slug)}}">
                                {{Str::title($featured->topic)}}
                            </a></h6>
                        <div class="row align-items-center no-gutters">
                            <div class="col-11">
                                <ul class="tt-list-badge">
                                    <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">{{$featured->category ? Str::title($featured->category->name) : 'UnCategorized'}}</span></a></li>
                                    @if(count($featured->tags) > 0)
                                        @foreach($featured->tags as $tag)
                                            <li><a href="#"><span class="tt-badge">{{$tag->name}}</span></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-1 ml-auto show-mobile">
                                <div class="tt-value">{{$featured->created_at ? $featured->created_at->diffForHumans() : ''}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tt-col-category"><span class="tt-color03 tt-badge">{{$featured->category ? Str::title($featured->category->name) : 'UnCategorized'}}</span></div>
                    <div class="tt-col-value  hide-mobile">{{count($featured->likes) > 0 ? count($featured->likes) : 0}}</div>
                    <div class="tt-col-value tt-color-select  hide-mobile">{{count($featured->replies) > 0 ? count($featured->replies) : 0}}</div>
                    <div class="tt-col-value  hide-mobile">{{count($featured->views) > 0 ? count($featured->views) : 0}}</div>
                    <div class="tt-col-value hide-mobile">{{$featured->created_at ? $featured->created_at->diffForHumans() : ''}}</div>
                </div>

            @endforeach

        @endif
        {{--Featured TOPIC NOTIFICATION ENDS--}}



        <div class="tt-list-header">
            <h3>Recent Threads</h3>
        </div>

        @if(count($threads) > 0)

        {{--LIST OF TOPICS STARTS--}}

            @foreach($threads as $thread)

                <div class="tt-item">
                    <div class="tt-col-avatar">
                        <img style="border-radius: 50%;" width="40" height="40" src="{{$thread->user->photo ? $thread->user->photo->path : '/images/users/default.png'}}" alt="">
                    </div>
                    <div class="tt-col-description">
                        <h6 class="tt-title"><a href="{{route('fe.topic', $thread->slug ?? '')}}">
                                {{Str::title($thread->topic)}}
                            </a></h6>
                        <div class="row align-items-center no-gutters">
                            <div class="col-11">
                                <ul class="tt-list-badge">
                                    <li class="show-mobile"><a href="{{route('fe.category', $thread->category->id ?? '')}}"><span class="tt-color04 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></a></li>
                                    @if(count($thread->tags) > 0)
                                        <?php $cnt = 1; ?>
                                        @foreach($thread->tags as $tag)
                                            <li><a href="#"><span class="tt-badge">{{$tag->name}}</span></a></li>
                                            @if($cnt === 2)
                                                @break
                                            @endif
                                            <?php $cnt++ ?>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-1 ml-auto show-mobile">
                                <div class="tt-value">{{$thread->created_at ? $thread->created_at->diffForHumans() : ''}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tt-col-category"><span class="tt-color04 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></div>
                    <div class="tt-col-value  hide-mobile">{{count($thread->likes) > 0 ? count($thread->likes) : 0}}</div>
                    <div class="tt-col-value tt-color-select  hide-mobile">{{count($thread->replies) > 0 ? count($thread->replies) : 0}}</div>
                    <div class="tt-col-value  hide-mobile">{{count($thread->views) > 0 ? count($thread->views) : 0}}</div>
                    <div class="tt-col-value hide-mobile">{{$thread->created_at ? $thread->created_at->diffForHumans() : ''}}</div>
                </div>

                <?php $count++; ?>

                @if($count === (count($threads) / 2))

                    @if(!(Auth::user()))
                        {{--LOGIN AND SIGNUP ADVERT STARTS--}}

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
                                <a href="{{route('login')}}" type="button" class="btn btn-primary">Log in</a>
                                <a href="{{route('register')}}" type="button" class="btn btn-secondary">Sign up</a>
                            </div>
                        </div>

                        {{--LOGIN AND SIGNUP ADVERT ENDS--}}

                    @endif



                @endif

            @endforeach

        {{--LIST OF TOPICS ENDS--}}


            {{--PAGINATION STARTS HERE--}}
            <div class="tt-row-btn">
                <div class="btn-icon js-topiclist-showmore">
                    {{$threads->links()}}
                </div>
            </div>
            {{--PAGINATION ENDS HERE--}}

        @else

            <h2 class="mt-5 text-center">No Thread Yet</h2>

        @endif


    </div>


@endsection