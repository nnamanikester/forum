@extends('layouts.front_end')


@section('title') {{ Str::title($category->name) . ' Category' }} @endsection


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
                        <li><a href="#"><span class="tt-color01 tt-badge">{{Str::title($category->name)}}</span></a></li>
                    </ul>
                </div>
                <div class="ml-left tt-col-right">
                    <div class="tt-col-item">
                        <h2 class="tt-value">Threads - {{count($category->threads) > 0 ? count($category->threads) : 0}}</h2>
                    </div>
                    <div class="tt-col-item">
                        <a href="#" class="tt-btn-icon">
                            <i class="tt-icon"><svg><use xlink:href="#icon-favorite"> </use> </svg> </i>
                            {{count($category->favourites) > 0 ? count($category->favourites) : 0}}
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
                {{$category->description ? Str::title($category->description) : ''}}
            </div>
            <div class="tt-innerwrapper">
                <h6 class="tt-title">OTHER CATEGORIES</h6>
                <ul class="tt-list-badge">
                    @foreach($categories as $otherCategory)
                        @if($otherCategory->id === $category->id)
                            @continue;
                        @endif

                        <li><a href="{{route('fe.category', $otherCategory->id)}}"><span class="tt-badge">{{Str::title($otherCategory->name)}}</span></a></li>

                    @endforeach
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

            @foreach($threads as $thread)
                <div class="tt-item">
                    <div class="tt-col-avatar">
                        <img width="40" height="40" src="{{$thread->user->photo ? $thread->user->photo->path : '/images/users/default.png'}}" alt="">
                    </div>
                    <div class="tt-col-description">
                        <h6 class="tt-title"><a href="{{route('fe.topic', $thread->slug)}}">
                                {{Str::title($thread->topic)}}
                            </a></h6>
                        <div class="row align-items-center no-gutters">
                            <div class="col-11">
                                <ul class="tt-list-badge">
                                    <li class="show-mobile"><a href="{{route('fe.category', $thread->category->id ?? '')}}"><span class="tt-color01 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></a></li>
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
                    <div class="tt-col-category"><span class="tt-color01 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></div>
                    <div class="tt-col-value  hide-mobile">{{count($thread->likes) > 0 ? count($thread->likes) : 0}}</div>
                    <div class="tt-col-value tt-color-select  hide-mobile">{{count($thread->replies) > 0 ? count($thread->replies) : 0}}</div>
                    <div class="tt-col-value  hide-mobile">{{count($thread->views) > 0 ? count($thread->views) : 0}}</div>
                    <div class="tt-col-value hide-mobile">{{$thread->created_at ? $thread->created_at->diffForHumans() : ''}}</div>
                </div>
            @endforeach



            <div class="tt-row-btn">
                {{$threads->links()}}
            </div>
        </div>



@endsection
