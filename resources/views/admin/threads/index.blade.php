@extends('layouts.admin')


@section('title') Threads @endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Threads</li>
    </ol>



    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-list-ol"></i>
            All Threads</div>
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
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>

                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>the best thing to happen</td>
                        <td><span class="badge badge-secondary">Politics</span></td>
                        <td><span class="badge badge-primary"><i class="fas fa-thumbs-up"></i> 364</span></td>
                        <td><span class="badge badge-danger"><i class="fas fa-thumbs-down"></i> 127</span></td>
                        <td><span class="badge badge-success"><i class="fas fa-reply"></i> 127</span></td>
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


