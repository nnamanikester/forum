@extends('layouts.front_end')

@section('title') {{('Create A Topic')}} @endsection


{{--@section('header')--}}
    {{--@include('inc.header_logged_in')--}}
{{--@endsection--}}


@section('content')

    <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                Create New Thread
            </h1>

            {{Form::open(['method'=>'POST', 'action'=>'UserDashboardController@topicstore', 'class'=>'form-default form-create-topic'])}}

                {{Form::hidden('status', 0)}}
                {{Form::hidden('featured', 0)}}
                {{Form::hidden('user_id', Auth::user()->id)}}


                <div class="form-group">
                    {{Form::label('topic', 'Topic')}}
                    <div class="tt-value-wrapper">
                        {{Form::text('topic', null, ['class'=>'form-control', 'placeholder'=>'Subject of your topic'])}}
                        {{--<span class="tt-value-input">99</span>--}}
                    </div>
                    <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
                </div>


                <div class="pt-editor">
                    <h6 class="pt-title">Body</h6>
                    <div class="form-group">
                        {{Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Let\'s get started'])}}
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('category_id', 'Category')}}
                                {{Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control'])}}
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group">
                                {{Form::label('tags', 'Tags')}}
                                {{ Form::text('tags', null, ['class'=>'form-control', 'placeholder'=>'Use Comma Separated Tags']) }}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-auto ml-md-auto">
                            {{ Form::submit('Create Post', ['class'=>'btn btn-secondary btn-width-lg']) }}
                        </div>
                    </div>
                </div>
        {{Form::close()}}
        </div>
        <div class="tt-topic-list tt-offset-top-30">
            <div class="tt-list-search">
                <div class="tt-title">Suggested Topics</div>
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



            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-ava-t"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="#">
                            Cannot customize my intro
                        </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-auto">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="#"><span class="tt-color07 tt-badge">video games</span></a></li>
                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                            </ul>
                        </div>
                        <div class="col-auto ml-auto show-mobile">
                            <div class="tt-value">2d</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category"><span class="tt-color07 tt-badge">video games</span></div>
                <div class="tt-col-value hide-mobile">364</div>
                <div class="tt-col-value tt-color-select  hide-mobile">36</div>
                <div class="tt-col-value  hide-mobile">982</div>
                <div class="tt-col-value hide-mobile">2d</div>
            </div>





            <div class="tt-row-btn">
                <button type="button" class="btn-icon js-topiclist-showmore">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-load_lore_icon"></use>
                    </svg>
                </button>
            </div>
        </div>

@endsection