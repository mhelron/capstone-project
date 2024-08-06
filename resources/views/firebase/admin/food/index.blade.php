@extends('firebase.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Food</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Food</li>
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

                <!-- Search Form -->
                <div class="d-flex justify-content-between mb-2">
                    <form action="{{ route('admin.food') }}" method="GET" class="form-inline">
                        <div class="form-group mb-2">
                            <input type="text" name="search" class="form-control" placeholder="Search by dish name" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ml-2">Search</button>
                        <a href="{{ route('admin.food') }}" class="btn btn-secondary mb-2 ml-2">Clear Search</a>
                    </form>
                    <a href="{{ route('admin.food.add') }}" class="btn btn-primary mb-2">Add Food</a>
                </div>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                          <th scope="col">#</th>
                          <th scope="col">Dish Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Category</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php $i = 1; @endphp
                        @forelse ($food as $key =>$item)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item['dish_name']}}</td>
                            <td>{{$item['desc']}}</td>
                            <td>{{$item['category']}}</td>
                            <td><a href="{{url('admin/food/edit-food/' .$key)}}" class="btn btn-sm btn-success">Edit</a></td>
                            <td><a href="{{url('admin/food/delete-food/'.$key)}}" class="btn btn-sm btn-danger">Delete</a></td>
                          </tr>
                        @empty
                        <tr>
                          <td colspan="7">No Food Found</td>
                        </tr>
                        @endforelse
                      </tbody>
                  </table>
                </div>

                <div class="justify-content-center">
                    {{ $food->links('vendor.pagination.simple-pagination') }}
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection