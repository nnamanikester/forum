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

    <div>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create_level"><i class="fas fa-plus"></i> Create Level</a>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-layer-group"></i>
            Levels</div>

        <div class="card-body">



            @if(count($levels) > 0)


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



                        @foreach($levels as $level)

                            @if($level->name == 'newbie')
                                <?php $class = 'badge-danger'; ?>
                            @elseif($level->name == 'regular')
                                <?php $class = 'badge-info'; ?>
                            @elseif($level->name == 'master')
                                <?php $class = 'badge-success'; ?>
                            @else
                                <?php $class = 'badge-secondary'; ?>
                            @endif

                            <tr>
                                <td>{{$sn++}}</td>
                                <td><span class="badge {{$class ?? ''}}">{{$level->name}}</span></td>
                                <td><span class="badge badge-secondary">{{count($level->users) > 0 ? count($level->users) : 0}}</span></td>
                                <td>{{$level->created_at->diffForHumans()}}</td>
                                <td>{{$level->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('levels.users', $level->id)}}" class="badge badge-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('levels.edit', $level->id)}}" class="badge badge-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method'=>'DELETE', 'id'=>'deleteForm', 'action'=>['AdminLevelsController@destroy', $level->id]]) !!}
                                        <button class="badge badge-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            @else

                <h1 class="text-center">No Levels</h1>

            @endif

        </div>
    </div>






    {{--<div class="modal fade" id="delete_level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this level?</h5>--}}
                    {{--<button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">Click "Delete" button below to delete the level</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
                    {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminLevelsController@destroy', $level->id]]) !!}--}}
                    {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



    {{--LEVEL CREATE MODAL--}}


    <div class="modal fade" id="create_level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Level</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">



                    {!! Form::open(['method'=>'POST', 'action'=>'AdminLevelsController@store']) !!}

                        {!! Form::hidden('created_by', Auth::user()->id) !!}
                        {!! Form::hidden('updated_by', Auth::user()->id) !!}

                    <div class="row">
                        <div class="form-group col-md-12">

                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'newbie']) !!}

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


@endsection

@section('scripts')


@endsection

