@extends('backend.layouts.master')
    <title>Corona Admin</title>

    @section('links')
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/favicon.png') }}" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.min.css">


    @endsection

    @section('content')
      
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body cat-body">
                    <h4 class="card-title">Product</h4>
                    @include('backend.layouts.flashMsg')

                    <a href="{{ route('product.create') }}" class="btn btn-success create-btn">+ Create Product</a>
                    <div class="table-responsive">
                      <table class="table " >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
   
    @endsection



    @section('scripts')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/settings.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/todolist.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
            
            var table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'product', name: 'product'},
                    {data: 'description', name: 'description'},
                    {data: 'price', name: 'price'},
                    {data: 'stock', name: 'stock'},
                  //   {data: 'image', name: 'image'
                  //   render: function(data, type, row) {
                  //               return '<img src="' + data + '" "height="1" width="1"/>' +
                  //                   data + '</span>';
                  //               }


                  //       }
                  // },
                    {data: 'action', name: 'action', 

                    // columnDefs:
                    // [{
                    //     "targets": 2,
                    //     "data": 'image',
                    //     "render": function (data, type, row, meta) {
                    //         return '<img src="' + data + '" alt="' + data + '"height="160" width="160"/>';
                    //     }
                    // }],
                   
                    orderable: false,
                    searchable: false},
                ]
            });
            });
            
        </script>

    @endsection
{{-- 
    <script type="text/javascript">
      $(document).ready(function () {
      
      var table = $('.table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('user.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'first_name', name: 'first_name'},
              {data: 'last_name', name: 'last_name'},
              {data: 'email', name: 'email'},
              {data: 'address', name: 'address'},
              {data: 'number', name: 'number'
              orderable: false,
              searchable: false},
          ]
      });
      });
      
  </script> --}}
