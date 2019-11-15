@extends('layouts.admin')


@section('title') Pending Threads @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('threads.index')}}">Threads</a>
        </li>
        <li class="breadcrumb-item active">Pending Threads</li>
    </ol>


    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-list-ol"></i>
            Pending Thread
        </div>

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




    </div>




@endsection


