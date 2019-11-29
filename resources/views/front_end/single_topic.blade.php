@extends('layouts.front_end')


@section('title') {{ Str::title($thread->topic) }} @endsection


{{--@section('header')--}}
    {{--@if(Auth::check())--}}
        {{--@include('inc.header_logged_in')--}}
    {{--@else--}}
        {{--@include('inc.header')--}}
    {{--@endif--}}
{{--@endsection--}}


@section('content')

        <div class="tt-single-topic-list">
            <div class="tt-item">
                <div class="tt-single-topic">
                    <div class="tt-item-header">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-d"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                                <a href="#">{{ Str::title($thread->user->username) }}</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{ $thread->created_at->toFormattedDateString() }}
                            </a>
                        </div>
                        <h3 class="tt-item-title">
                            <a href="#">{{ Str::title($thread->topic) }}</a>
                        </h3>
                        <div class="tt-item-tag">
                            <ul class="tt-list-badge">
                                <li><a href="{{route('fe.category', $thread->category->id ?? '')}}"><span class="tt-color03 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></a></li>
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
                    </div>
                    <div class="tt-item-description">
                        {!! $thread->description !!}
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadLikeUnlike', $thread->id]]) }}
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                @if($liked && ($liked->user_id === Auth::user()->id))
                                    <button style="border: none; background: none; border-radius: 40%; background-color: #3ebafa;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i></button>
                                @else
                                    <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i></button>
                                @endif
                                <span class="tt-text">{{ count($thread->likes) > 0 ? count($thread->likes) : 0 }}</span>
                            {{ Form::close() }}

                        </a>
                        <a href="#" class="tt-icon-btn">

                            {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadDislikeUndislike', $thread->id]]) }}
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                @if($disliked && ($disliked->user_id === Auth::user()->id))
                                    <button style="border: none; background: none; border-radius: 40%; background-color: #3ebafa;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i></button>
                                @else
                                    <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i></button>
                                @endif
                            <span class="tt-text">{{ count($thread->dislikes) > 0 ? count($thread->dislikes) : 0 }}</span>
                            {{ Form::close() }}

                        </a>
                        <a href="#" class="tt-icon-btn">

                            {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadFavouriteUnfavourite', $thread->id]]) }}
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                @if($favourited && ($favourited->user_id === Auth::user()->id))
                                    <button style="border: none; background: none; border-radius: 100%; background-color: #ff0000;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i></button>
                                @else
                                    <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i></button>
                                @endif
                                <span class="tt-text">{{ count($thread->favourites) > 0 ? count($thread->favourites) : 0 }}</span>
                            {{ Form::close() }}

                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>

                        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
                            {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadFlag', $thread->id]]) }}
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                @if($flag)
                                    <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                        <button class="tt-icon" style="border: none; background: none; border-radius: 50%; background-color: #ff0000;" type="submit"><i class="tt-flag"><svg><use xlink:href="#icon-flag"></use></svg></i></button>
                                    </a>
                                @else
                                    <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                        <button class="tt-icon" style="border: none; background: none;" type="submit"><i class="tt-flag"><svg><use xlink:href="#icon-flag"></use></svg></i></button>
                                    </a>
                                @endif
                            {{ Form::close() }}
                        @endif

                        <a href="#reply" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                        </a>
                    </div>
                </div>
            </div>






            <div class="tt-item">
                <div class="tt-info-box">
                    <h6 class="tt-title">Thread Status</h6>
                    <div class="tt-row-icon">
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                <span class="tt-text">{{ count($thread->replies) > 0 ? count($thread->replies) : 0 }}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-view"></use></svg></i>
                                <span class="tt-text">{{ count($thread->views) > 0 ? count($thread->views) : 0 }}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                <span class="tt-text">{{ count($thread->likes) > 0 ? count($thread->likes) : 0 }}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                                <span class="tt-text">{{ count($thread->dislikes) > 0 ? count($thread->dislikes) : 0 }}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                <span class="tt-text">{{ count($thread->favourites) > 0 ? count($thread->favourites) : 0 }}</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                <span class="tt-text">{{ count($thread->shares) > 0 ? count($thread->shares) : 0 }}</span>
                            </a>
                        </div>
                    </div>





                    <hr>
                    <div class="row-object-inline form-default">
                        <h6 class="tt-title">Sort replies by:</h6>
                        <ul class="tt-list-badge tt-size-lg">
                            <li><a href="#"><span class="tt-badge">Recent</span></a></li>
                            <li><a href="#"><span class="tt-color02 tt-badge">Most Liked</span></a></li>
                            <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                            <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                            <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
                        </ul>
                        <select class="tt-select form-control">
                            <option value="Recent">Recent</option>
                            <option value="Most Liked">Most Liked</option>
                            <option value="Longest">Longest</option>
                            <option value="Shortest">Shortest</option>
                            <option value="Accepted Answer">Accepted Answer</option>
                        </select>
                    </div>


                </div>
            </div>






            {{--REPLIES START HERE--}}

            @if(count($replies) > 0)
                @foreach($replies as $reply)

                    <?php

                        $reliked = $reply->likes->first();
                        $redisliked = $reply->dislikes->first();
                        $refavourited = $reply->favourites->first();
                        $reflag = $reply->flags->first();

                    ?>

                    <div class="tt-item">
                        <div class="tt-single-topic">
                            <div class="tt-item-header pt-noborder">
                                <div class="tt-item-info info-top">
                                    <div class="tt-avatar-icon">
                                        <img style="border-radius: 50%;" width="40" height="40" src="{{$reply->user->photo ? $reply->user->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-avatar-title">
                                        <a href="{{ route('user.profile', $reply->user->username) }}">{{ Str::title($reply->user->username) }}</a>
                                    </div>
                                    <a href="#" class="tt-info-time">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{ $reply->created_at->toFormattedDateString() }}
                                    </a>
                                </div>
                            </div>
                            <div class="tt-item-description">
                                {!! $reply->body !!}


                                {{--REPLIES TO A REPLY START HERE--}}
                                @if(count($reply->replies) > 0)
                                    @foreach($reply->replies->paginate(2) as $level_reply)
                                        <div class="topic-inner-list">
                                            <div class="topic-inner">
                                                <div class="topic-inner-title">
                                                    <div class="topic-inner-avatar">
                                                        <img style="border-radius: 50%;" width="40" height="40" src="{{$level_reply->user->photo ? $level_reply->user->photo->path : '/images/users/default.png'}}" alt="">
                                                    </div>
                                                    <div class="topic-inner-title"><a href="{{ route('user.profile', $level_reply->username) }}">{{ Str::title($level_reply->user->username) }}</a></div>
                                                </div>
                                                <div class="topic-inner-description">
                                                    {!! $level_reply->body !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                        <div class="tt-row-btn">
                                            {{--PAGINATON WILL GO HERE--}}
                                            {{ $reply->replies->links() }}
                                        </div>
                                @endif

                                {{--REPLIES TO A REPLY END HERE--}}

                            </div>



                            <div class="tt-item-info info-bottom">
                                <a href="#" class="tt-icon-btn">
                                    {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadReplyLikeUnLike', $reply->id]]) }}
                                        {{ Form::hidden('user_id', Auth::user()->id) }}
                                        @if($reliked && ($reliked->user_id === Auth::user()->id))
                                            <button style="border: none; background: none; border-radius: 40%; background-color: #3ebafa;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i></button>
                                        @else
                                            <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i></button>
                                        @endif
                                        <span class="tt-text">{{ count($reply->likes) > 0 ? count($reply->likes) : 0 }}</span>
                                    {{ Form::close() }}

                                </a>
                                <a href="#" class="tt-icon-btn">

                                    {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadReplyDislikeUndislike', $reply->id]]) }}
                                        {{ Form::hidden('user_id', Auth::user()->id) }}
                                        @if($redisliked && ($redisliked->user_id === Auth::user()->id))
                                            <button style="border: none; background: none; border-radius: 40%; background-color: #3ebafa;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i></button>
                                        @else
                                            <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i></button>
                                        @endif
                                        <span class="tt-text">{{ count($reply->dislikes) > 0 ? count($reply->dislikes) : 0 }}</span>
                                    {{ Form::close() }}

                                </a>
                                <a href="#" class="tt-icon-btn">

                                    {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadReplyFavouriteUnfavourite', $reply->id]]) }}
                                        {{ Form::hidden('user_id', Auth::user()->id) }}
                                        @if($refavourited && ($refavourited->user_id === Auth::user()->id))
                                            <button style="border: none; background: none; border-radius: 100%; background-color: #ff0000;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i></button>
                                        @else
                                            <button style="border: none; background: none;" type="submit"><i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i></button>
                                        @endif
                                        <span class="tt-text">{{ count($reply->favourites) > 0 ? count($reply->favourites) : 0 }}</span>
                                    {{ Form::close() }}

                                </a>
                                <div class="col-separator"></div>
                                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                </a>

                                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
                                    {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadReplyFlag', $reply->id]]) }}
                                        {{ Form::hidden('user_id', Auth::user()->id) }}
                                        @if($reflag)
                                            <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                                <button class="tt-icon" style="border: none; background: none; border-radius: 50%; background-color: #ff0000;" type="submit"><i class="tt-flag"><svg><use xlink:href="#icon-flag"></use></svg></i></button>
                                            </a>
                                        @else
                                            <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                                <button class="tt-icon" style="border: none; background: none;" type="submit"><i class="tt-flag"><svg><use xlink:href="#icon-flag"></use></svg></i></button>
                                            </a>
                                        @endif
                                    {{ Form::close() }}
                                @endif

                                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
            {{--REPLIES ENDS HERE--}}




            {{--FLAGGED REPLY--}}
            <div class="tt-item tt-wrapper-danger">
                <div class="tt-single-topic">
                    <div class="tt-item-header pt-noborder">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-u"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                                <a href="#">usain31</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                            </a>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        This post has been flagged by a moderator, received too many downvotes.
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="tt-item-info info-bottom">
                                <a href="#" class="tt-icon-btn">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                                    <span class="tt-text">39</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto ml-auto">
                            <a href="#" class="btn btn-primary tt-offset-27">Show Reply</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="tt-wrapper-inner">
            <h4 class="tt-title-separator"><span>You’ve reached the end of replies</span></h4>
        </div>


        @if(!(Auth::user()))

            <div class="tt-item tt-item-popup">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-ava-f"></use>
                    </svg>
                </div>
                <div class="tt-col-message">
                    Looks like you are new here. Login or Register to reply threads.
                </div>
                <div class="tt-col-btn">
                    <a href="{{route('login')}}" type="button" class="btn btn-primary">Log in</a>
                    <a href="{{route('register')}}" type="button" class="btn btn-secondary">Sign up</a>
                </div>
            </div>

        @else



            <div class="tt-wrapper-inner" id="reply">
                {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@threadReply', $thread->id]]) }}
                <div class="pt-editor form-default">
                    <h6 class="pt-title" id="reply">Post Your Reply</h6>

                    {{ Form::hidden('thread_id', $thread->id) }}
                    {{ Form::hidden('user_id', Auth::user()->id) }}
                    <div class="form-group">
                        {{ Form::textarea('body', null, ['class'=>'form-control']) }}
                    </div>
                    <div class="pt-row">
                        <div class="col-auto">
                            <div class="checkbox-group">
                                {{--<input type="checkbox" id="checkBox21" name="checkbox" checked="">--}}
                                <label for="checkBox21">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    <span class="tt-text">Subscribe to this topic.</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            {{ Form::submit('Reply', ['class'=>'btn btn-secondary btn-width-lg']) }}
                        </div>
                    </div>
                </div>

                {{ Form::close() }}
            </div>

        @endif




        <div class="tt-topic-list tt-ofset-30">
            <div class="tt-list-search">
                <div class="tt-title">Related Topics</div>
                <!-- tt-search -->
                <div class="tt-search">
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search for topics">
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
                <!-- /tt-search -->
            </div>
            <div class="tt-list-header tt-border-bottom">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value hide-mobile">Likes</div>
                <div class="tt-col-value hide-mobile">Replies</div>
                <div class="tt-col-value hide-mobile">Views</div>
                <div class="tt-col-value">Activity</div>
            </div>




            @if(count($relateds) > 0)
                @foreach($relateds as $related)
                    <div class="tt-item">
                        <div class="tt-col-avatar">
                            <img style="border-radius: 50%;" width="40" height="40" src="{{$related->user->photo ? $related->user->photo->path : '/images/users/default.png'}}" alt="">
                        </div>
                        <div class="tt-col-description">
                            <h6 class="tt-title"><a href="{{ route('fe.topic', $related->slug) }}">
                                    {{ Str::title($related->topic) }}
                                </a></h6>
                            <div class="row align-items-center no-gutters">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile"><a href="{{route('fe.category', $related->category->id ?? '')}}"><span class="tt-color07 tt-badge">{{$related->category ? Str::title($related->category->name) : 'UnCategorized'}}</span></a></li>
                                        @if(count($related->tags) > 0)
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
                                    <div class="tt-value">{{$related->created_at ? $related->created_at->diffForHumans() : ''}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-category"><span class="tt-color07 tt-badge">{{$related->category ? Str::title($related->category->name) : 'UnCategorized'}}</span></div>
                        <div class="tt-col-value hide-mobile">{{count($related->likes) > 0 ? count($related->likes) : 0}}</div>
                        <div class="tt-col-value tt-color-select  hide-mobile">{{count($related->replies) > 0 ? count($related->replies) : 0}}</div>
                        <div class="tt-col-value  hide-mobile">{{count($related->views) > 0 ? count($related->views) : 0}}</div>
                        <div class="tt-col-value hide-mobile">{{$related->created_at ? $related->created_at->diffForHumans() : ''}}</div>
                    </div>
                @endforeach
            @endif

            <div class="tt-row-btn">
                {{--PAGINATON WILL GO HERE--}}
                {{ $relateds->links() }}
            </div>
        </div>


@endsection