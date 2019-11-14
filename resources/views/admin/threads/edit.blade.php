@extends('layouts.admin')


@section('title') Edit Thread @endsection

@section('content')



    <a href="#" id="editButton" data-toggle="modal" data-target="#edit_thread"></a>

    <div class="modal fade" id="edit_thread" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Thread</h5>
                    <a href="{{route('threads.index')}}" class="close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">

                    {!! Form::model($thread, ['method'=>'PATCH', 'action'=>['AdminThreadsController@update', $thread->id]]) !!}


                    {!! Form::hidden('updated_by', Auth::user()->id) !!}
                    <div class="row">
                        <div class="form-group col-md-6">

                            {!! Form::label('topic', 'Topic:') !!}
                            {!! Form::text('topic', null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-6">

                            {!! Form::label('category_id', 'Category:') !!}
                            {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-12">

                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status', [''=>'Select Status', '1'=>'Active', '0'=>'Pending'], null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group col-md-12">

                            {!! Form::label('description', 'Body:') !!}
                            {!! Form::textarea('description', null, ['cols'=>'30', 'rows'=>'3', 'class'=>'form-control']) !!}

                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <a href="{{route('threads.index')}}" class="btn btn-secondary">Cancel</a>
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>

        document.getElementById('editButton').click();



    </script>

@endsection