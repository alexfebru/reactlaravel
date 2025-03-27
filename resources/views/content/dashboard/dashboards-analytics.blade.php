@extends('layouts/contentNavbarLayout')
@section('content')
  <div class="row gy-4">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
        <h4>Products List
          <a href="{{ url('/getProduct') }}" class="btn btn-primary float-end">Add Products</a>
        </h4>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th class="text-truncate">Title</th>
                <th class="text-truncate">Price</th>
                <th class="text-truncate">Description</th>
                <th class="text-truncate">Category</th>
                <th class="text-truncate">Image</th>
                <th class="text-truncate">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $value)
                <tr>
                  <td class="text-truncate">{{ $value->title }}</td>
                  <td class="text-truncate">{{ $value->price }}</td>
                  <td class="text-truncate">{{ $value->description }}</td>
                  <td class="text-truncate">{{ $value->category }}</td>
                  <td class="text-truncate">
                    <img src="{{asset('assets/img/products/product-1.jpg')}}" alt="Product 1" class="rounded-circle" width="50">
                  </td>
                  <td class="text-truncate">
                    <a href="{{ url('/editProduct') }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('product/delete') }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              
              @endforeach
                <!-- <tr>
                  <td class="text-truncate">1</td>
                  <td class="text-truncate">1000</td>
                  <td class="text-truncate">Product 1 Description</td>
                  <td class="text-truncate">Category 1</td>
                  <td class="text-truncate">
                    <img src="{{asset('assets/img/products/product-1.jpg')}}" alt="Product 1" class="rounded-circle" width="50">
                  </td>
                  <td class="text-truncate">
                    <a href="{{ url('/editProduct') }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('product/delete') }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr> -->
           
            </tbody>
          </table>
       
        </div>
      </div>
    </div>

  </div>

   <!-- Data Tables -->

  <!-- <div class="row gy-4">

    <div class="col-12">
    <div class="card">
      <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
        <tr>
          <th class="text-truncate">User</th>
          <th class="text-truncate">Email</th>
          <th class="text-truncate">Role</th>
          <th class="text-truncate">Age</th>
          <th class="text-truncate">Salary</th>
          <th class="text-truncate">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
          <div class="d-flex align-items-center">
            <div class="avatar avatar-sm me-3">
            <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
            </div>
            <div>
            <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
            <small class="text-truncate">@amiccoo</small>
            </div>
          </div>
          </td>
          <td class="text-truncate">susanna.Lind57@gmail.com</td>
          <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin</td>
          <td class="text-truncate">24</td>
          <td class="text-truncate">34500$</td>
          <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
        </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>

  </div> -->
@endsection
