@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">
 
  <div class="col-12">
    <div class="card">
      
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">ID</th>
              <th class="text-truncate">Title</th>
              <th class="text-truncate">Category</th>
              <th class="text-truncate">Description</th>
              <th class="text-truncate">Price</th>
              <th class="text-truncate">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, index) in products"
                :key="product.id"
              
            >
              <td>@{{product.id}}</td>    
              <td>@{{product.title}}</td> 
              <td>@{{product.category}}</td>
              <td>@{{product.description}}</td>
              <td>@{{product.price}}</td>
              
            </tr>
              

              <!-- <td>   
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                    <small class="text-truncate">@amiccoo</small>
                  </div>
                </div>
              </td> -->
              <!-- <td class="text-truncate">susanna.Lind57@gmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin</td>
              <td class="text-truncate">24</td>
              <td class="text-truncate">34500$</td>
              <td><span class="badge bg-label-warning rounded-pill">Pending</span></td> -->
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
