@extends('layouts.admin')


@section('title') {{Str::title($role->name)}}s @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('roles.index')}}">Roles</a>
        </li>
        <li class="breadcrumb-item active">{{Str::title($role->name)}}s</li>
    </ol>


    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-users"></i>
            {{Str::title($role->name)}}s</div>

        <div class="card-body">



            @if(count($users) > 0)


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
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>

                        </thead>
                        <tbody>



                        @foreach($users as $user)

                            @if($user->level->name == 'newbie')
                                <?php $class = 'badge-danger'; $levelfa = 'fa-grin'; ?>
                            @elseif($user->level->name == 'regular')
                                <?php $class = 'badge-info'; $levelfa = 'fa-lemon'; ?>
                            @elseif($user->level->name == 'master')
                                <?php $class = 'badge-success'; $levelfa = 'fa-leaf'; ?>
                            @else
                                <?php $class = 'badge-secondary'; ?>
                            @endif
                            <tr>
                                <td>{{$sn++}}</td>
                                <td><img width="30" height="30" src="{{$user->photo ? $user->photo->path : 'no photo' }}" alt=""></td>
                                <td>{{Str::title($user->name)}}</td>
                                <td><span class="badge badge-success">{{Str::title($user->username)}}</span></td>
                                <td>{{$user->email}}</td>
                                <td><span class="badge badge-info"><i class="fas fa-question"></i> {{count($user->threads) > 0 ? count($user->threads) : 0}}</span></td>
                                <td><span class="badge {{$class}}"><i class="fas {{$levelfa}}"></i> {{$user->level ? $user->level->name : 'no level'}}</span></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#view_user"  class="badge badge-success"><i class="fas fa-eye"></i></a>
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
            @else

                <h1 class="text-center">No User</h1>

            @endif

        </div>
    </div>






    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this category?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click "Delete" button below to delete the User</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id ?? '']]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    {{--VIEW USERS MODAL--}}
    <div class="modal fade" id="view_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{Str::title($user->name ?? '')}}</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close" class="close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Name:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{$user->name ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Username:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$user->username ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Email:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{$user->email ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Country:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{$user->country ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Bio:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{$user->bio ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Website:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{$user->website ?? ''}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Website:</strong>
                                </div>
                                <div class="col-md-8">
                                    @if($user->status ?? '')
                                        @if($user->status == 1)
                                            {{__('Active')}}
                                        @endif
                                        @if($user->status == 2)
                                            {{__('Blocked')}}
                                        @endif
                                        @if($user->status == 0)
                                            {{__('Inactive')}}
                                        @endif
                                    @endif
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Role:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{Str::title($user->role->name ?? '')}}
                                </div>

                            </div>

                        </div>

                        <div class="form-group col-md-6 col-lg-12">

                            <div class="row">

                                <div class="col-md-4">
                                    <strong>Level:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{Str::title($user->level->name ?? '')}}
                                </div>

                            </div>

                        </div>



                    </div>

                </div>
                <div class="modal-footer">

                    <a href="#" data-dismiss="modal" aria-label="Close"  class="btn btn-secondary">Close</a>

                </div>
            </div>
        </div>
    </div>




@endsection

@section('scripts')


@endsection

