@extends('layouts.admin')


@section('title') Threads @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Threads</li>
    </ol>


    <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#create_thread" ><i class="fas fa-plus"></i> Create Thread</button>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-list-ol"></i>
            All Threads</div>

        @if(count($threads) > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                    <tr>
                        <th>S/N</th>
                        <th>Topic</th>
                        <th>Category</th>
                        <th>Likes</th>
                        <th>Dislikes</th>
                        <th>Replies</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>

                    </thead>
                    <tbody>

                    @foreach($threads as $thread)

                        @if($thread->status == 1)
                            <?php $class = 'badge-success'; $fa = 'fa-times'; ?>
                        @else
                            <?php $class = 'badge-warning'; $fa = 'fa-check'; ?>
                        @endif

                        @if($thread->category)
                            <?php $badge = 'badge-primary'; ?>
                        @else
                            <?php $badge = 'badge-secondary'; ?>
                        @endif

                        <tr>
                            <td>{{$sn++}}</td>
                            <td>{{Str::title($thread->topic, 12)}}</td>
                            <td><span class="badge {{$badge}}">{{Str::title($thread->category ? $thread->category->name : 'No Category')}}</span></td>
                            <td><span class="badge badge-primary"><i class="fas fa-thumbs-up"></i> {{count($thread->likes)> 0 ? count($thread->likes) : 0}}</span></td>
                            <td><span class="badge badge-danger"><i class="fas fa-thumbs-down"></i> {{count($thread->dislikes)> 0 ? count($thread->dislikes) : 0}}</span></td>
                            <td><span class="badge badge-success"><i class="fas fa-reply"></i> {{count($thread->replies)> 0 ? count($thread->relies) : 0}}</span></td>
                            <td><span class="badge badge-info"><i class="fas fa-eye"></i> {{count($thread->views)> 0 ? count($thread->views) : 0}}</span></td>
                            <td><a href="{{route('threads.status', $thread->slug)}}" class="badge {{$class}}"><i class="fas {{$fa}}"></i> </a></td>
                            <td>{{$thread->created_by}}</td>
                            <td>{{$thread->updated_by}}</td>
                            <td>{{$thread->created_at->diffForHumans()}}</td>
                            <td>{{$thread->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('threads.show', $thread->id)}}" class="badge badge-success"><i class="fas fa-eye"></i></a>
                                <a href="{{route('threads.edit', $thread->id)}}" class="badge badge-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method'=>'DELETE', 'id'=>'deleteForm', 'action'=>['AdminThreadsController@destroy', $thread->id]]) !!}
                                <button class="badge badge-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        @else

            <h1 class="text-center">{{'No Available Thread'}}</h1>

        @endif






        {{--Thread CREATE MODAL--}}
        <div class="modal fade" id="create_thread" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Thread</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        {!! Form::open(['method'=>'POST', 'action'=>'AdminThreadsController@store']) !!}

                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {!! Form::hidden('status', 0) !!}
                            {!! Form::hidden('created_by', Auth::user()->id) !!}
                            {!! Form::hidden('updated_by', Auth::user()->id) !!}

                        <div class="row">
                            <div class="form-group col-md-6">

                                {!! Form::label('topic', 'Topic:') !!}
                                {!! Form::text('topic', null, ['class'=>'form-control', 'placeholder'=>'The legends of tomorrow']) !!}

                            </div>

                            <div class="form-group col-md-6">

                                {!! Form::label('category_id', 'Category:') !!}
                                {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}

                            </div>

                            <div class="form-group col-md-12">

                                {!! Form::label('description', 'Body:') !!}
                                {!! Form::textarea('description', null, ['cols'=>'30', 'rows'=>'1', 'class'=>'form-control', 'placeholder'=>'Let\'s talk about the legends']) !!}

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






    </div>




@endsection


