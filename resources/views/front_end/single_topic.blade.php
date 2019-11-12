@extends('layouts.front_end')


@section('title') {{('Topic Title')}} @endsection


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
                                <a href="#">dylan89</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                            </a>
                        </div>
                        <h3 class="tt-item-title">
                            <a href="#">Web Hosting Packages for ThemeForest WordPress</a>
                        </h3>
                        <div class="tt-item-tag">
                            <ul class="tt-list-badge">
                                <li><a href="#"><span class="tt-color03 tt-badge">exchange</span></a></li>
                                <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                <li><a href="#"><span class="tt-badge">elements</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        <h6 class="tt-title">Get ready for Movember!</h6>
                        <p>
                            It’s time to channel your inner Magnum P.I., Ron Swanson or Hercule Poroit! It’s the time that all guys (or gals) love and all our
                            partners hate It’s Movember!
                        </p>
                        <p>
                            Throughout November we will be inviting all community members to help raise awareness and funds for the lives of men affected
                            by cancer and mental health problems via the Movember Foundation 10.
                        </p>
                        <h6 class="tt-title">How Does it Work?</h6>
                        <p>
                            Authors and customers with facial hair unite! Simply grow, groom, and share your facial hair during November! Even females can enter if they desire (be creative, ladies!). Be inspired by checking out last year’s highlights 28.
                        </p>
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                            <span class="tt-text">671</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                            <span class="tt-text">39</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            <span class="tt-text">12</span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
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
                                <span class="tt-text">283</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-view"></use></svg></i>
                                <span class="tt-text">10.5k</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-user"></use></svg></i>
                                <span class="tt-text">168</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                <span class="tt-text">2.4k</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                <span class="tt-text">951</span>
                            </a>
                        </div>
                        <div class="tt-item">
                            <a href="#" class="tt-icon-btn tt-position-bottom">
                                <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                <span class="tt-text">32</span>
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

            <div class="tt-item">
                <div class="tt-single-topic">
                    <div class="tt-item-header pt-noborder">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-v"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                                <a href="#">vickey03</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                            </a>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        Finally!<br>
                        Are there any special recommendations for design or an updated guide that includes new preview sizes, including retina displays?



                        {{--REPLIES TO A REPLY--}}
                        <div class="topic-inner-list">
                            <div class="topic-inner">
                                <div class="topic-inner-title">
                                    <div class="topic-inner-avatar">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-ava-s"></use></svg></i>
                                    </div>
                                    <div class="topic-inner-title"><a href="#">summit92</a></div>
                                </div>
                                <div class="topic-inner-description">
                                    Finally!<br>
                                    Are there any special recommendations for design or an updated guide that includes new preview sizes, including retina displays?
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                            <span class="tt-text">671</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                            <span class="tt-text">39</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            <span class="tt-text">12</span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                        </a>
                    </div>
                </div>
            </div>




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



        <div class="tt-topic-list">
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
        </div>




        <div class="tt-wrapper-inner">
            <div class="pt-editor form-default">
                <h6 class="pt-title">Post Your Reply</h6>
                <div class="pt-row">
                    <div class="col-left">
                        <ul class="pt-edit-btn">
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-quote"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-bold"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-italic"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-share_topic"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-blockquote"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-performatted"></use>
                                    </svg>
                                </button></li>
                            <li class="hr"></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-upload_files"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-bullet_list"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-heading"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-horizontal_line"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-emoticon"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-settings"></use>
                                    </svg>
                                </button></li>
                            <li><button type="button" class="btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-color_picker"></use>
                                    </svg>
                                </button></li>
                        </ul>
                    </div>
                    <div class="col-right tt-hidden-mobile">
                        <a href="#" class="btn btn-primary">Preview</a>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" rows="5" placeholder="Lets get started"></textarea>
                </div>
                <div class="pt-row">
                    <div class="col-auto">
                        <div class="checkbox-group">
                            <input type="checkbox" id="checkBox21" name="checkbox" checked="">
                            <label for="checkBox21">
                                <span class="check"></span>
                                <span class="box"></span>
                                <span class="tt-text">Subscribe to this topic.</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-secondary btn-width-lg">Reply</a>
                    </div>
                </div>
            </div>
        </div>




        <div class="tt-topic-list tt-ofset-30">
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
                    <h6 class="tt-title"><a href="{{route('fe.topic')}}">
                            Cannot customize my intro
                        </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-11">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="#"><span class="tt-color07 tt-badge">video games</span></a></li>
                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                            </ul>
                        </div>
                        <div class="col-1 ml-auto show-mobile">
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
                {{--PAGINATON WILL GO HERE--}}
                <button type="button" class="btn-icon js-topiclist-showmore">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-load_lore_icon"></use>
                    </svg>
                </button>
            </div>
        </div>


@endsection