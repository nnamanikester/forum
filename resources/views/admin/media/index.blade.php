
@extends('layouts.admin')


@section('title') Levels @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Levels</li>
    </ol>

    <iframe src="/laravel-filemanager" style="width: 100%; height: 50px; overflow: hidden; border: none;"></iframe>

@endsection

@section('scripts')


@endsection






