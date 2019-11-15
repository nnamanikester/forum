@extends('layouts.admin')


@section('title') Users @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </ol>


    <div>

        <button class="btn btn-primary" data-toggle="modal" data-target="#create_user">Create User</button>

    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-users"></i>
            All Users</div>
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
                            <?php $status = 'Pending'; $class = 'badge-warning'; $fa = 'fa-info-circle'; ?>
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
                            <td><img width="30" height="30" src="{{$user->photo ? $user->photo->path : '/images/users/default.png'}}" alt=""></td>
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



    {{--DELETE USER MODAL--}}
    {{--<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this User?</h5>--}}
                    {{--<button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">Click "Delete" button below to delete the user</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
                    {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}--}}
                    {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



    {{--CREATE USER MODAL--}}

    <div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <a href="#" data-dismiss="modal" class="close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">

                    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

                    <div class="row">

                        <div class="form-group col-md-6">

                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'John Doe']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('username', 'Username:') !!}
                            {!! Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'johndoe']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Johndoe@email.com']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'123456']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('country', 'Country:') !!}
                            {!! Form::text('country', null, ['class'=>'form-control', 'placeholder'=>'Nigeria']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('bio', 'Bio:') !!}
                            {!! Form::textarea('bio', null, ['class'=>'form-control', 'placeholder'=>'I am a web developer...', 'rows'=>'1']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('website', 'Website:') !!}
                            {!! Form::text('website', null, ['class'=>'form-control', 'placeholder'=>'google.com']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status', [''=>'Select Status', '1'=>'Active', '0'=>'Inactive', '2'=>'Blocked'],  null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('role_id', 'Role:') !!}
                            {!! Form::select('role_id', [''=>'Select Role'] + $roles,  null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('level_id', 'Level:') !!}
                            {!! Form::select('level_id', [''=>'Select Level'] + $levels, null, ['class'=>'form-control']) !!}

                        </div>



                    </div>

                </div>
                <div class="modal-footer">

                    <a href="#" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection


