@extends('backend.layouts.master')
@section('links')

   

<link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ URL::asset('backend/assets/css/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/favicon.png')}}" />
@endsection

@section('content')

{{-- <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Table</h4>
          <p class="card-description"> Add class <code>.table</code>
          </p>
          <div class="table-responsive">
           
          </div>
        </div>
      </div>
    </div> --}}
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> User Detail </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>
                <tbody>

                    
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->number }}</td>
                  </tr>
              
                    </tbody>
                </table>
                <a href="{{ route('user.index') }}" class="btn btn-danger ml-2">Back</a>

                 </div>

             </div>
          </div>
        </div>
    </div>

      @endsection
        <!-- container-scroller -->
        <!-- plugins:js -->
    @section('scripts')
        <script src="{{ URL::asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ URL::asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ URL::asset('backend/assets/js/off-canvas.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/misc.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/settings.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ URL::asset('backend/assets/js/file-upload.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/typeahead.js') }}"></script>
        <script src="{{ URL::asset('backend/assets/js/select2.js') }}"></script>
        <!-- End custom js for this page -->
    @endsection

