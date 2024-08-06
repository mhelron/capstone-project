@extends('firebase.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Food</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Food</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-9">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('admin.food')}}" class="btn btn-danger">Back</a>
            </div>
            <div class="card">
              <div class="card-body">
                <form action="{{ route('admin.food.store') }}" method="POST">
                    @csrf
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <div class="d-flex align-items-center">
                                <select name="category" id="category" class="form-control">
                                    <option value="Main Dish">Main Dish</option>
                                    <option value="Side Dish">Side Dish</option>
                                    <option value="Dessert">Dessert</option> 
                                    <option value="Drinks">Drinks</option>
                                </select>
                                <span class="ml-2"><i class="fas fa-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="dish_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Description</label>
                            <input type="text" name="desc" class="form-control">
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