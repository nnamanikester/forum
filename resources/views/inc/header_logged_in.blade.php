<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                    <a href="{{route('fe.home')}}"><img src="/images/users/default.png" alt=""></a>
                </div>
                <!-- /logo -->
                <!-- desctop menu -->
                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="{{route('fe.home')}}"><span>Home</span></a></li>
                            <li><a href="{{route('fe.trending')}}"><span>Trending</span></a></li>
                            @if(Auth::user()->role)
                                @if(Auth::user()->role->name == 'administrator')
                                    <li><a href="{{route('admin.index')}}"><span>Admin</span></a></li>
                                @endif
                            @endif
                            <li>
                                <a href="#"><span>Pages</span></a>
                                <ul>
                                    <li><a href="{{route('user.lists')}}">All Users</a></li>
                                    <li><a href="{{route('fe.page', 'about')}}">About</a></li>
                                    <li><a href="{{route('fe.page', 'guidelines')}}">Guidelines</a></li>
                                    <li><a href="{{route('fe.page', 'faq')}}">FAQs</a></li>
                                    <li><a href="{{route('fe.page', 'terms')}}">Terms Of Use</a></li>
                                    <li><a href="{{route('fe.page', 'privacy')}}">Privacy Policy</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <button class="tt-search__close">
                                <svg class="tt-icon">
                                    <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <div class="tt-search-scroll">
                                <ul>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto">
                <div class="tt-user-info d-flex justify-content-center">
                    <a href="{{route('user.dashboard')}}" class="tt-btn-icon">
                        <i class="tt-icon"><svg><use xlink:href="#icon-notification"></use></svg></i>
                    </a>
                    <a href="{{route('user.dashboard')}}">
                        <div class="tt-avatar-icon tt-size-md">
                            <i class="tt-icon">
                                <img style="border-radius: 50%;" width="40" height="40" src="{{Auth::user()->photo ? Auth::user()->photo->path : '/images/users/default.png'}}" alt="">
                            </i>
                            <strong>{{Str::title(Auth::user()->username)}}</strong>

                        </div>
                    </a>

                    <a class="tt-btn-icon" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <strong><i class="fas fa-power-off"></i></strong>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>