@extends('layouts.admin')


@section('title') Active Users @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('users.index')}}">Users</a>
        </li>
        <li class="breadcrumb-item active">Active Users</li>
    </ol>


    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-check"></i>
            <i class="fas fa-users"></i>
            Active Users</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Threads</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>

                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        @if($user->status == 1)
                            <?php $status = 'Block'; $class = 'badge-success'; $fa = 'fa-ban'; ?>
                        @elseif($user->status == 0)
                            <?php $status = 'Active'; $class = 'badge-warning'; $fa = 'fa-info-circle'; ?>
                        @else
                            <?php $status = 'Activate'; $class = 'badge-danger'; $fa = 'fa-check'; ?>
                        @endif


                        @if($user->level->name == 'newbie')
                            <?php $classs = 'badge-danger'; $levelfa = 'fa-grin'; ?>
                        @elseif($user->level->name == 'regular')
                            <?php $classs = 'badge-info'; $levelfa = 'fa-lemon'; ?>
                        @elseif($user->level->name == 'master')
                            <?php $classs = 'badge-success'; $levelfa = 'fa-leaf'; ?>
                        @else
                            <?php $classs = 'badge-secondary'; ?>
                        @endif

                        <tr>
                            <td>{{$sn++}}</td>
                            <td><img width="30" height="30" src="{{$user->photo ? $user->photo->path : 'no photo'}}" alt=""></td>
                            <td>{{Str::title($user->name)}}</td>
                            <td><span class="badge badge-primary"></i> {{$user->username}}</span></td>
                            <td>{{$user->email}}</td>
                            <td><span class="badge badge-info"><i class="fas fa-reply"></i> {{count($user->threads) > 0 ? count($user->threads) : 0}}</span></td>
                            <td><span class="badge {{$classs}}"><i class="fas {{$levelfa ?? ''}}"></i> {{$user->level->name}}</span></td>
                            <td><a href="{{route('users.status', $user->id)}}" class="badge {{$class}}"><i class="fas {{$fa}}"></i> {{$status}}</a></td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="#" class="badge badge-success"><i class="fas fa-eye"></i></a>
                                <a href="{{route('users.edit', $user->id)}}" class="badge badge-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method'=>'DELETE', 'id'=>'deleteForm', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                                <button class="badge badge-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection


