@extends('layouts.front_end')

@section('title') {{Str::title($user->username)}} @endsection


{{--@section('header')--}}
{{--@include('inc.header_logged_in')--}}
{{--@endsection--}}


@if($user->level)
    @if($user->level->name == 'newbie')
        <?php $class = 'tt-color08'; $levelfa = 'fa-grin'; ?>
    @elseif($user->level->name == 'regular')
        <?php $class = 'tt-color03'; $levelfa = 'fa-lemon'; ?>
    @elseif($user->level->name == 'master')
        <?php $class = 'tt-color19'; $levelfa = 'fa-leaf'; ?>
    @else
        <?php $class = 'badge-secondary'; ?>
    @endif
@endif


@section('content')

    {{--PROFILE INFO--}}
    <div class="tt-wrapper-section">
        <div class="container">
            <div class="tt-user-header">
                <div class="tt-col-avatar">
                    <div class="tt-icon">
                        <svg class="tt-icon">
                            <img width="40" height="40" src="{{$user->photo ? $user->photo->path : '/images/users/default.png'}}" alt="">
                        </svg>
                    </div>
                </div>
                <div class="tt-col-title">
                    <div class="tt-title">
                        <a href="#">{{Str::title($user->username)}}</a>
                    </div>
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-badge {{$class}}" style="color: white;"><i class="fa {{$levelfa}}"> </i> {{$user->level ? $user->level->name : 'No Level'}}</span></a></li>
                    </ul>
                </div>
                <div class="tt-col-btn" >
                    <div class="tt-list-btn">
                        <a href="{{route('user.compose')}}" class="btn btn-primary">Message</a>
                        @if($followed && ($followed->user_id == $user->id))
                            {{ Form::open(['method'=>'DELETE', 'action'=>['UserDashboardController@unfollow', $followed->id]]) }}
                                {{ Form::submit('UnFollow', ['class'=>'btn btn-primary']) }}
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['method'=>'POST', 'action'=>['UserDashboardController@follow', $user->id]]) }}
                                {{ Form::submit('Follow', ['class'=>'btn btn-secondary', 'style'=>'color: #fff;']) }}
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h3 class="tt-title text-center mt-3">
        Bio
    </h3>
    <span class="text-center">{!! $user->bio !!}</span>
    {{--PROFILE INFO ENDS --}}



    {{--TAB BEGINGS--}}
    <div class="container">
        <div class="tt-tab-wrapper">
            <div class="tt-wrapper-inner">
                <ul class="nav nav-tabs pt-tabs-default" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tt-tab-02" role="tab"><span>{{count($threads) > 0 ? count($threads) : 0}} Threads</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"><span>{{count($replies) > 0 ? count($replies) : 0}} Replies</span></a>
                    </li>
                    <li class="nav-item tt-hide-xs">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-04" role="tab"><span>{{count($followers) > 0 ? count($followers) : 0}} Followers</span></a>
                    </li>
                    <li class="nav-item tt-hide-md">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-05" role="tab"><span>{{count($followings) > 0 ? count($followings) : 0}} Following</span></a>
                    </li>
                </ul>

            </div>


            <div class="tab-content">


                {{--THREADS--}}

                <div class="tab-pane tt-indent-none active" id="tt-tab-02" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Date</div>
                        </div>


                        @if(count($threads) > 0)
                            @foreach($threads as $thread)
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <img width="40" height="40" src="{{$thread->user->photo ? $thread->user->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="{{route('fe.topic', $thread->slug ?? '')}}">
                                                {{Str::title($thread->topic)}}
                                            </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-11">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="{{route('fe.category', $thread->category->slug ?? '')}}"><span class="tt-color01 tt-badge">{{$thread->category ? Str::title($thread->category->name) : 'UnCategorized'}}</span></a></li>
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
                                    <div class="tt-col-value hide-mobile">{{count($thread->likes) > 0 ? count($thread->likes) : 0}}</div>
                                    <div class="tt-col-value tt-color-select  hide-mobile">{{count($thread->replies) > 0 ? count($thread->replies) : 0}}</div>
                                    <div class="tt-col-value hide-mobile">{{count($thread->views) > 0 ? count($thread->views) : 0}}</div>
                                    <div class="tt-col-value hide-mobile">{{$thread->created_at ? $thread->created_at->diffForHumans() : ''}}</div>
                                </div>

                            @endforeach
                        @else

                            <h3 class="text-center">{{Str::title($user->username)}} Have No Thread</h3>

                        @endif




                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            {{$threads->links()}}
                        </div>


                    </div>
                </div>







                {{--REPLIES--}}
                <div class="tab-pane tt-indent-none" id="tt-tab-03" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value">Date</div>
                        </div>


                        @if(count($replies) > 0)
                            @foreach($replies as $reply)
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <img width="40" height="40" src="{{$reply->user->photo ? $reply->user->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="{{route('fe.topic', $reply->thread->slug)}}">
                                                {{Str::title($reply->thread->topic)}}
                                            </a></h6>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">5 Jan,19</div>
                                            </div>
                                        </div>
                                        <div class="tt-content">
                                            {!! $reply->body !!}
                                        </div>
                                    </div>
                                    <div class="tt-col-category"><a href="#"><span class="tt-color06 tt-badge">{{$reply->thread->category ? Str::title($reply->thread->category->name) : 'UnCategorized'}}</span></a></div>
                                    <div class="tt-col-value-large hide-mobile">{{$reply->created_at->diffForHumans()}}</div>
                                </div>
                            @endforeach
                        @else

                            <h3 class="text-center">No Replies Found</h3>

                        @endif


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            {{$replies->links()}}
                        </div>


                    </div>
                </div>


                {{--FOLLOWERS--}}
                <div class="tab-pane tt-indent-none" id="tt-tab-04" role="tabpanel">
                    <div class="tt-followers-list">
                        <div class="tt-list-header">
                            <div class="tt-col-name">User</div>
                            <div class="tt-col-value-large hide-mobile">Follow date</div>
                            {{--<div class="tt-col-value-large hide-mobile">Last Activity</div>--}}
                            <div class="tt-col-value-large hide-mobile">Threads</div>
                            <div class="tt-col-value-large hide-mobile">Replies</div>
                            <div class="tt-col-value">Level</div>
                        </div>

                        @foreach($followers as $follower)

                            @if($follower->user->level)
                                @if($follower->user->level->name == 'newbie')
                                    <?php $classs = 'tt-color08'; $levelfaa = 'fa-grin'; ?>
                                @elseif($follower->user->level->name == 'regular')
                                    <?php $classs = 'tt-color03'; $levelfaa = 'fa-lemon'; ?>
                                @elseif($follower->user->level->name == 'master')
                                    <?php $classs = 'tt-color19'; $levelfaa = 'fa-leaf'; ?>
                                @else
                                    <?php $classs = 'badge-secondary'; ?>
                                @endif
                            @endif

                            <div class="tt-item">
                                <div class="tt-col-merged">
                                    <div class="tt-col-avatar">
                                        <img width="40" height="40" src="{{$follower->user->photo ? $follower->user->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="{{ route('user.profile', $follower->user->username) }}">{{Str::title($follower->user->name)}}</a></h6>
                                        <ul>
                                            <li><a href="{{ route('user.profile', $follower->user->username) }}">{{'@'.$follower->user->username}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tt-col-value-large hide-mobile">{{$follower->created_at->diffForHumans()}}</div>
                                {{--<div class="tt-col-value-large hide-mobile tt-color-select">10 hours ago</div>--}}
                                <div class="tt-col-value-large hide-mobile">{{count($follower->user->threads) > 0 ? count($follower->user->threads) : 0}}</div>
                                <div class="tt-col-value-large hide-mobile">{{count($follower->user->thread_replies) > 0 ? count($follower->user->thread_replies) : 0}}</div>
                                <div class="tt-col-value hide-mobile"><span class="{{$classs}} tt-badge"><i class="fa {{$levelfaa}}"></i> {{$follower->user->level->name}}</span></div>
                            </div>

                        @endforeach


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            {{$followers->links()}}
                        </div>

                    </div>
                </div>




                {{--FOLLOWING--}}
                <div class="tab-pane tt-indent-none" id="tt-tab-05" role="tabpanel">
                    <div class="tt-followers-list">
                        <div class="tt-list-header">
                            <div class="tt-col-name">User</div>
                            <div class="tt-col-value-large hide-mobile">Follow date</div>
                            <div class="tt-col-value"></div>
                            <div class="tt-col-value-large hide-mobile">Threads</div>
                            <div class="tt-col-value-large hide-mobile">Replies</div>
                            <div class="tt-col-value">Level</div>
                        </div>

                        @foreach($followings as $following)


                            @if($following->user->level)
                                @if($following->user->level->name == 'newbie')
                                    <?php $clas = 'tt-color08'; $levelf = 'fa-grin'; ?>
                                @elseif($following->user->level->name == 'regular')
                                    <?php $classs = 'tt-color03'; $levelf = 'fa-lemon'; ?>
                                @elseif($following->user->level->name == 'master')
                                    <?php $clas = 'tt-color19'; $levelf = 'fa-leaf'; ?>
                                @else
                                    <?php $classs = 'badge-secondary'; ?>
                                @endif
                            @endif


                            <div class="tt-item">
                                <div class="tt-col-merged">
                                    <div class="tt-col-avatar">
                                        <img width="40" height="40" src="{{$following->user->photo ? $following->user->photo->path : '/images/users/default.png'}}" alt="">
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="{{ route('user.profile', $following->user->username) }}">{{Str::title($following->user->name)}}</a></h6>
                                        <ul>
                                            <li><a href="{{ route('user.profile', $following->user->username) }}">{{'@'.$following->user->username}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tt-col-value-large hide-mobile">{{$following->created_at->diffForHumans()}}</div>
                                {{--<div class="tt-col-value-large hide-mobile tt-color-select">{{$following->created_at->diffForHumans()}}</div>--}}

                                <div class="tt-col-value">
                                    {{ Form::open(['method'=>'DELETE', 'action'=>['UserDashboardController@unfollow', $following->id]]) }}
                                    {{ Form::submit('Unfollow', ['class'=>'tt-badge btn-secondary']) }}
                                    {{ Form::close() }}
                                </div>

                                <div class="tt-col-value-large hide-mobile">{{count($following->user->threads) > 0 ? count($following->user->threads) : 0}}</div>
                                <div class="tt-col-value-large hide-mobile">{{count($following->user->thread_replies) > 0 ? count($following->user->thread_replies) : 0}}</div>
                                <div class="tt-col-value hide-mobile"><span class="{{$clas}} tt-badge"><i class="fa {{$levelf}}"></i> {{$following->user->level->name}}</span></div>
                            </div>

                        @endforeach


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            {{$followings->links()}}
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection