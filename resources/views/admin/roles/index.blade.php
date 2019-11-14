@extends('layouts.admin')


@section('title') Roles @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Roles</li>
    </ol>

    <div>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create_role"><i class="fas fa-plus"></i> Create Role</a>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-layer-group"></i>
            Roles</div>

        <div class="card-body">



            @if(count($roles) > 0)


                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Users</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>

                        </thead>
                        <tbody>



                        @foreach($roles as $role)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td><span class="badge badge-primary">{{$role->name}}</span></td>
                                <td><span class="badge badge-secondary">{{count($role->users) > 0 ? count($role->users) : 0}}</span></td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>{{$role->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('roles.users', $role->id)}}" class="badge badge-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('roles.edit', $role->id)}}" class="badge badge-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method'=>'DELETE', 'id'=>'deleteForm', 'action'=>['AdminRolesController@destroy', $role->id]]) !!}
                                        <button class="badge badge-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            @else

                <h1 class="text-center">No Roles</h1>

            @endif

        </div>
    </div>






    <div class="modal fade" id="delete_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this role?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click "Delete" button below to delete the role</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminRolesController@destroy', $role->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>




    {{--CREATE ROLES MODAL--}}
    <div class="modal fade" id="create_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                        {!! Form::open(['method'=>'POST', 'action'=>'AdminRolesController@store']) !!}

                        {!! Form::hidden('created_by', Auth::user()->id) !!}
                        {!! Form::hidden('updated_by', Auth::user()->id) !!}

                        <div class="row">
                            <div class="form-group col-md-12">

                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Administrator']) !!}

                            </div>
                        </div>




                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    {{--EDIT ROLES MODAL--}}
    {{--<div class="modal fade" id="edit_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>--}}
                    {{--<a href="{{route('roles.index')}}" class="close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}

                    {{--{!! Form::model($role, ['method'=>'PATCH', 'action'=>['AdminRolesController@update', $role->id ?? '']]) !!}--}}


                    {{--{!! Form::hidden('updated_by', Auth::user()->id) !!}--}}
                    {{--<div class="row">--}}
                        {{--<div class="form-group col-md-12">--}}

                            {{--{!! Form::label('name', 'Name:') !!}--}}
                            {{--{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Politics']) !!}--}}

                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="modal-footer">--}}

                    {{--<a href="{{route('roles.index')}}" class="btn btn-secondary">Cancel</a>--}}
                    {{--{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}--}}

                    {{--{!! Form::close() !!}--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}




@endsection

@section('scripts')


@endsection

