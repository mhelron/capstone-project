@extends('firebase.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Users</h1>
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
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('admin.users')}}" class="btn btn-danger">Back</a>
            </div>
            <div class="card">
              <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                            <label>User Role</label>
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Owner">Owner</option>
                                <option value="BookKeeper">Book Keeper</option> 
                                <option value="Accounting">Accounting</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection