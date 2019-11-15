@extends('layouts.admin')


@section('title') Edit User @endsection

@section('content')



    <a href="#" id="editButton" data-toggle="modal" data-target="#edit_user"></a>

    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <a href="{{route('users.index')}}" class="close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">

                    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

                        <div class="row">

                            <div class="form-group col-md-4">

                                <img width="100" height="100" src="{{$user->photo ? $user->photo->path : ''}}" alt="">

                            </div>

                            <div class="form-group col-md-8">

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

                    <a href="{{route('users.index')}}" class="btn btn-secondary">Cancel</a>
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