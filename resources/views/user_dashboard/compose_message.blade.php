@extends('layouts.front_end')

@section('title') {{('Compose Message')}} @endsection


{{--@section('header')--}}
    {{--@include('inc.header_logged_in')--}}
{{--@endsection--}}


@section('content')

        <div class="tt-messages-layout">
            <div class="row no-gutters">
                <div class="col-md-4 tt-aside" id="js-aside">
                    <a href="#" class="tt-title-aside">
                        <h2 class="tt-title">
                            Messages
                        </h2>
                        <i class="tt-icon">
                            <svg class="icon">
                                <use xlink:href="#icon-pencil"></use>
                            </svg>
                        </i>
                    </a>


                    <div class="tt-all-avatar">
                        <div class="tt-box-search">
                            <input class="tt-input" type="text" placeholder="Search messages">
                            <a href="#" class="tt-btn-input">
                                <svg>
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </a>
                            <a href="#" class="tt-btn-icon">
                                <svg class="icon">
                                    <use xlink:href="#icon-filter"></use>
                                </svg>
                            </a>
                        </div>



                        <div class="tt-list-avatar js-init-scroll">


                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-c"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Clive</span> <span class="time">Jan 12</span></h4>
                                    <div class="tt-message">Clive: Happy New Yero brother :)</div>
                                </div>
                            </a>

                        </div>
                    </div>




                </div>
                <div class="col-md-8">
                    <div class="tt-title-content">
                        <a href="#" class="tt-toggle-aside">
                            <i class="tt-icon">
                                <svg class="icon">
                                    <use xlink:href="#icon-arrow_left"></use>
                                </svg>
                            </i>
                        </a>
                        <h2 class="tt-title">
                            New message
                        </h2>
                    </div>
                    <div class="tt-search-compose">
                        <div class="tt-input">
                            <input type="text" class="tt-search-input" placeholder="Type a name or multiple names">
                        </div>
                        <div class="tt-search-results">


                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-s"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Smith</span></h4>
                                    <div class="tt-value">@smith45</div>
                                </div>
                            </a>

                        </div>



                    </div>


                    <div class="tt-wrapper-inner">
                        <div class="pt-editor form-default">
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
                            </div>



                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Write your message here"></textarea>
                            </div>
                            <div class="pt-row">
                                <div class="col-auto ml-auto">
                                    <a href="#" class="btn btn-secondary btn-custom">Send</a>
                                </div>
                            </div>


                        </div>





                    </div>
                </div>
            </div>
        </div>

@endsection