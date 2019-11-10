@extends('layouts.admin')


@section('title') Categories @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>


    <div class="card mb-3 col-md-6 col-sm-12">

        <h4>Create Category</h4>
        <hr>

        <form action="">

            <div class="row">
                <div class="form-group col-md-6">

                    <label for="">Name:</label>
                    <input type="text" class="form-control" placeholder="Politics" />

                </div>

                <div class="form-group col-md-6">

                    <label for="">Description:</label>
                    <textarea placeholder="This is the politics description" name="" id="" cols="30" rows="1" class="form-control"></textarea>

                </div>
            </div>

            <div class="form-group">

                <input type="submit" class="form-control btn btn-primary" value="Create">

            </div>

        </form>

    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-layer-group"></i>
            Categories</div>
        <div class="card-body">
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
                    <tr>
                        <td>1</td>
                        <td><span class="badge badge-secondary">Politics</span></td>
                        <td>This is the description</td>
                        <td><span class="badge badge-primary"><i class="fas fa-question"></i> 364</span></td>
                        <td><span class="badge badge-danger"><i class="fas fa-heart"></i> 127</span></td>
                        <td><span class="badge badge-info"><i class="fas fa-eye"></i> 3876</span></td>
                        <td>25 min ago</td>
                        <td>25 min ago</td>
                        <td>
                            <span class="badge badge-success"><i class="fas fa-eye"></i></span>
                            <span class="badge badge-primary"><i class="fas fa-edit"></i></span>
                            <span class="badge badge-danger"><i class="fas fa-trash-alt"></i></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection


