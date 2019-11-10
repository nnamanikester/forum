@extends('layouts.front_end')


@section('title') {{('Topic Title')}} @endsection


@section('header')
    @include('inc.header')
@endsection


@section('content')

        <div class="tt-categories-title">
            <div class="tt-title">Categories</div>
            <div class="tt-search">
                <form class="search-wrapper">
                    <div class="search-form">
                        <input type="text" class="tt-search__input" placeholder="Search Categories">
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




        <div class="tt-categories-list">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="tt-item">
                        <div class="tt-item-header">
                            <ul class="tt-list-badge">
                                <li><a href="{{route('fe.category')}}"><span class="tt-color01 tt-badge">politics</span></a></li>
                            </ul>
                            <h6 class="tt-title"><a href="{{route('fe.category')}}">Threads - 1,245</a></h6>
                        </div>
                        <div class="tt-item-layout">
                            <div class="innerwrapper">
                                Lets discuss about whats happening around the world politics.
                            </div>
                            <div class="innerwrapper">
                                <h6 class="tt-title">TAGS</h6>
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
        </div>

@endsection