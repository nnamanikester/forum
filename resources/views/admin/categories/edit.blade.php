@extends('layouts.admin')


@section('title') Edit Category @endsection

@section('content')



    <a href="#" id="editButton" data-toggle="modal" data-target="#edit_category"></a>

<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <a href="{{route('categories.index')}}" class="close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">

                {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}


                    {!! Form::hidden('updated_by', Auth::user()->id) !!}
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

                    <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancel</a>
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