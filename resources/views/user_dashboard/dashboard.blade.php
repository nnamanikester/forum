@extends('layouts.front_end')

@section('title') {{('Compose Message')}} @endsection


@section('header')
    @include('inc.header_logged_in')
@endsection


@section('content')

    {{--PROFILE INFO--}}
    <div class="tt-wrapper-section">
        <div class="container">
            <div class="tt-user-header">
                <div class="tt-col-avatar">
                    <div class="tt-icon">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-ava-d"></use>
                        </svg>
                    </div>
                </div>
                <div class="tt-col-title">
                    <div class="tt-title">
                        <a href="#">Dylan89</a>
                    </div>
                    <ul class="tt-list-badge">
                        <li><a href="#"><span class="tt-color14 tt-badge">LVL : 26</span></a></li>
                    </ul>
                </div>
                <div class="tt-col-btn" >
                    <div class="tt-list-btn">
                        <a  id="js-settings-btn" href="#" class="tt-btn-icon">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-settings_fill"></use>
                            </svg>
                        </a>
                        <a href="{{route('user.compose')}}" class="btn btn-primary">Message</a>
                        <a href="#" class="btn btn-secondary">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--PROFILE INFO ENDS --}}



    {{--TAB BEGINGS--}}
   <div class="container">
        <div class="tt-tab-wrapper">
            <div class="tt-wrapper-inner">
                <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                    <li class="nav-item show">
                        <a class="nav-link active" data-toggle="tab" href="#tt-tab-01" role="tab"><span>Activity</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab"><span>Threads</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"><span>Replies</span></a>
                    </li>
                    <li class="nav-item tt-hide-xs">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-04" role="tab"><span>526 Followers</span></a>
                    </li>
                    <li class="nav-item tt-hide-md">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-05" role="tab"><span>489 Following</span></a>
                    </li>
                    <li class="nav-item tt-hide-md">
                        <a class="nav-link" data-toggle="tab" href="#tt-tab-06" role="tab"><span>Categories</span></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane tt-indent-none  show active" id="tt-tab-01" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-value-large hide-mobile">Category</div>
                            <div class="tt-col-value-large hide-mobile">Action</div>
                            <div class="tt-col-value-large hide-mobile">Date</div>
                        </div>



                        {{--ITEMS--}}
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-n"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                        Does Envato act against the authors of Envato markets?
                                    </a></h6>
                                <div class="tt-col-message">
                                    <a href="#">Dylan replied:</a> It’s time to channel your inner Magnum P.I., Ron Swanson or Hercule Poroit! It’s the time that all guys (or gals) love and all our partners hate It’s Movember!
                                </div>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-9">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>
                                        </ul>
                                        <a href="#" class="tt-btn-icon show-mobile">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="col-3 ml-auto show-mobile">
                                        <div class="tt-value">5 Jan,19</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color05 tt-badge">music</span></div>
                            <div class="tt-col-value-large hide-mobile">
                                <a href="#" class="tt-btn-icon">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                </a>
                            </div>
                            <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                        </div>

                        {{--ITEMS ENDS HERE--}}


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>









{{--THREADS--}}


                <div class="tab-pane tt-indent-none" id="tt-tab-02" role="tabpanel">
                    <div class="tt-topic-list">
                        <div class="tt-list-header">
                            <div class="tt-col-topic">Topic</div>
                            <div class="tt-col-category">Category</div>
                            <div class="tt-col-value hide-mobile">Likes</div>
                            <div class="tt-col-value hide-mobile">Replies</div>
                            <div class="tt-col-value hide-mobile">Views</div>
                            <div class="tt-col-value">Date</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-d"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
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
                            <div class="tt-col-value tt-color-select  hide-mobile">502</div>
                            <div class="tt-col-value hide-mobile">15.1k</div>
                            <div class="tt-col-value hide-mobile">1h</div>
                        </div>




                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
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
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-d"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title"><a href="#">
                                        Does Envato act against the authors of Envato markets?
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
                                    I really liked new badge - T-shirt. Will there be new contests with new badges for AudioJungle?
                                </div>
                            </div>
                            <div class="tt-col-category"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></div>
                            <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                        </div>


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>


                {{--FOLLOWERS--}}
                <div class="tab-pane tt-indent-none" id="tt-tab-04" role="tabpanel">
                    <div class="tt-followers-list">
                        <div class="tt-list-header">
                            <div class="tt-col-name">User</div>
                            <div class="tt-col-value-large hide-mobile">Follow date</div>
                            <div class="tt-col-value-large hide-mobile">Last Activity</div>
                            <div class="tt-col-value-large hide-mobile">Threads</div>
                            <div class="tt-col-value-large hide-mobile">Replies</div>
                            <div class="tt-col-value">Level</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-merged">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-t"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">Taylor</a></h6>
                                    <ul>
                                        <li><a href="mailto:@tails23">@tails23</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tt-col-value-large hide-mobile">10/01/2019</div>
                            <div class="tt-col-value-large hide-mobile tt-color-select">10 hours ago</div>
                            <div class="tt-col-value-large hide-mobile">0</div>
                            <div class="tt-col-value-large hide-mobile">6</div>
                            <div class="tt-col-value"><span class="tt-color16 tt-badge">LVL : 02</span></div>
                        </div>


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>




                {{--FOLLOWING--}}
                <div class="tab-pane tt-indent-none" id="tt-tab-05" role="tabpanel">
                    <div class="tt-followers-list">
                        <div class="tt-list-header">
                            <div class="tt-col-name">User</div>
                            <div class="tt-col-value-large hide-mobile">Follow date</div>
                            <div class="tt-col-value-large hide-mobile">Last Activity</div>
                            <div class="tt-col-value-large hide-mobile">Threads</div>
                            <div class="tt-col-value-large hide-mobile">Replies</div>
                            <div class="tt-col-value">Level</div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-merged">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-m"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">Mitchell</a></h6>
                                    <ul>
                                        <li><a href="mailto:@mitchell73">@mitchell73</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tt-col-value-large hide-mobile">05/01/2019</div>
                            <div class="tt-col-value-large hide-mobile tt-color-select">1 hours ago</div>
                            <div class="tt-col-value-large hide-mobile">1</div>
                            <div class="tt-col-value-large hide-mobile">3</div>
                            <div class="tt-col-value"><span class="tt-color19 tt-badge">LVL : 33</span></div>
                        </div>


                        <div class="tt-row-btn">
                            {{--PAGINATION GOES HERE--}}
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>




                {{--CATEGORIES--}}
                <div class="tab-pane" id="tt-tab-06" role="tabpanel">
                    <div class="tt-wrapper-inner">
                        <div class="tt-categories-list">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="tt-item">
                                        <div class="tt-item-header">
                                            <ul class="tt-list-badge">
                                                <li><a href="#"><span class="tt-color01 tt-badge">politics</span></a></li>
                                            </ul>
                                            <h6 class="tt-title"><a href="#">Threads - 1,245</a></h6>
                                        </div>
                                        <div class="tt-item-layout">
                                            <div class="innerwrapper">
                                                Lets discuss about whats happening around the world politics.
                                            </div>
                                            <div class="innerwrapper">
                                                <h6 class="tt-title">Similar TAGS</h6>
                                                <ul class="tt-list-badge">
                                                    <li><a href="#"><span class="tt-badge">world politics</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">human rights</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">trump</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">climate change</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">foreign policy</span></a></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="tt-btn-icon">
                                                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    {{--PAGINATION GOES HERE--}}
                                    <div class="tt-row-btn">
                                        <button type="button" class="btn-icon js-topiclist-showmore">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-load_lore_icon"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection