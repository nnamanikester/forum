@extends('layouts.admin')


@section('title') Edit Role @endsection

@section('content')



    <a href="#" id="editButton" data-toggle="modal" data-target="#edit_role"></a>

    <div class="modal fade" id="edit_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <a href="{{route('roles.index')}}" class="close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">

                    {!! Form::model($role, ['method'=>'PATCH', 'action'=>['AdminRolesController@update', $role->id]]) !!}


                    {!! Form::hidden('updated_by', Auth::user()->id) !!}
                    <div class="row">
                        <div class="form-group col-md-12">

                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Politics']) !!}

                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <a href="{{route('roles.index')}}" class="btn btn-secondary">Cancel</a>
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