@extends('layouts.admin')


@section('title') Categories @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#create_category" ><i class="fas fa-plus"></i> Create Category</button>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-list"></i>
            Categories</div>

        <div class="card-body">



            @if(count($categories) > 0)


            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Threads</th>
                        <th>Favourites</th>
                        <th>Views</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>

                    </thead>
                    <tbody>



                    @foreach($categories as $category)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td><span class="badge badge-secondary">{{$category->name}}</span></td>
                        <td>{{Str::limit($category->description, 24)}}</td>
                        <td><span class="badge badge-primary"><i class="fas fa-question"></i> {{count($category->threads) > 0 ? count($category->threads) : 0}}</span></td>
                        <td><span class="badge badge-danger"><i class="fas fa-heart"></i> {{count($category->favourites) > 0 ? count($category->favourites) : 0}}</span></td>
                        <td><span class="badge badge-info"><i class="fas fa-eye"></i> {{count($category->views) > 0 ? count($category->views) : 0}}</span></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('categories.threads', $category->id)}}" class="badge badge-success"><i class="fas fa-eye"></i></a>
                            <a href="{{route('categories.edit', $category->id)}}" class="badge badge-primary"><i class="fas fa-edit"></i></a>
                            {!! Form::open(['method'=>'DELETE', 'id'=>'deleteForm', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                            <button class="badge badge-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            @else

                <h1 class="text-center">No Categories</h1>

            @endif

        </div>
    </div>


    {{--CATEGORY DELETE MODAL--}}
    {{--<div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this category?</h5>--}}
                    {{--<button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">Click "Delete" button below to delete the category</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
                    {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}--}}
                        {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--CATEGORY CREATE MODAL--}}
    <div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

                    <div class="row">
                        <div class="form-group col-md-6">

                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Politics']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['cols'=>'30', 'rows'=>'1', 'class'=>'form-control', 'placeholder'=>'This is the politics description']) !!}

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

