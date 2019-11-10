@extends('layouts.front_end')

@section('title') {{('Message')}} @endsection


@section('header')
    @include('inc.header_logged_in')
@endsection


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
                                        <use xlink:href="#icon-ava-t"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Taylor</span> <span class="time">Feb 03</span></h4>
                                    <div class="tt-message tt-select">Taylor: need to see that</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-g"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Green</span> <span class="time">Feb 02</span></h4>
                                    <div class="tt-message tt-select">You: Alright ttyl</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-k"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Kevin</span> <span class="time">Jan 27</span></h4>
                                    <div class="tt-message">You: Business is good, but going a bit..</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Dylan</span> <span class="time">Jan 24</span></h4>
                                    <div class="tt-message">Dylan: modding fo skyrim</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-p"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Peterson</span> <span class="time">Jan 21</span></h4>
                                    <div class="tt-message">You: Sent you that email</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-s"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Smith</span> <span class="time">Jan 20</span></h4>
                                    <div class="tt-message">You: Let me know about that</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-u"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Usain</span> <span class="time">Jan 18</span></h4>
                                    <div class="tt-message">Usain: Will be online after 2pm</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-l"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Larry</span> <span class="time">Jan 16</span></h4>
                                    <div class="tt-message">Larry: :D</div>
                                </div>
                            </a>
                            <a href="#" class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-j"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h4 class="tt-title"><span>Jordan</span> <span class="time">Jan 16</span></h4>
                                    <div class="tt-message">You: Lets catch up later</div>
                                </div>
                            </a>
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
                            Kevin
                        </h2>
                        <div class="tt-description">
                            Last seen 3h ago
                        </div>
                        <a href="#" class="tt-icon-link">
                            <i class="tt-icon">
                                <svg class="icon">
                                    <use xlink:href="#notification"></use>
                                </svg>
                            </i>
                        </a>
                    </div>
                    <div class="tt-list-time-topic">
                        <div class="tt-item-title">
                            <span>12/26/2017</span>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-k"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title"><a href="#">Kevin</a> <span class="time">3:12 AM</span></h4>
                                <p>How is it going man? Did you see my new forum <a href="#" class="tt-underline-02">post?</a></p>
                            </div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-a"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title"><a href="#">azyrusmax</a> <span class="time">3:16 AM</span></h4>
                                <p>Hey, going good, what about you? yes I saw your post, great stuff man <a href="#" class="tt-underline-02">post?</a></p>
                            </div>
                        </div>
                        <div class="tt-item-title"><span>12/27/2017</span></div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-k"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title"><a href="#">Kevin</a> <span class="time">10:49 AM</span></h4>
                                <p>I’m doing good too, how’s business going?</p>
                            </div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-a"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title"><a href="#">Kevin</a> <span class="time">10:49 AM</span></h4>
                                <p>Business is good, but going a bit slow than usual.</p>
                            </div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-k"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title"><a href="#">Kevin</a> <span class="time">10:49 AM</span></h4>
                                <p>that happens during december, it will be fixed soon..</p>
                            </div>
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