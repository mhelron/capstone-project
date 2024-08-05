@extends('firebase.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            @if(session('status'))
              <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
            @endif
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('admin.users.add')}}" class="btn btn-primary"> Add User</a>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $i = 1; @endphp
                      @forelse ($users as $key =>$item)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$item['fname']}}</td>
                          <td>{{$item['lname']}}</td>
                          <td>{{$item['email']}}</td>
                          <td>{{$item['user_role']}}</td>
                          <td><a href="{{url('admin/users/edit-user/' .$key)}}" class="btn btn-sm btn-success">Edit</a></td>
                          <td><a href="{{url('admin/users/delete-user/'.$key)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                      @empty
                      <tr>
                        <td colspan="7">No Records Found</td>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection