@extends('backend.layouts.master')
    <title>Corona Admin</title>
    <!-- plugins:css -->
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
   
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title"> Edit Product </h3>
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
                      <h4 class="card-title">Product</h4>
                      <form class="forms-sample" action="{{ route('product.update', $data) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
  
                        <div class="form-group">
                          <label for="categoryInput">Product Name</label>
                          <input type="text" class="form-control   @error('prod_name') is-invalid @enderror" name="prod_name" value="{{ $data->product }}" placeholder="product name">
                          <span class="text-danger">  @error('prod_name'){{ $message }} @enderror </span>

                        </div>
  
                        <div class="form-group">
                          <label>Categories</label>
                          <select class="form-control @error('category') is-invalid @enderror" name="category" style="width:100%">

                            @foreach ($category as $categories)


                            <option  value="{{ $categories->id }}" {{$data->category_id == $categories->id  ? 'selected'  : ''}}>{{ $categories->category }}</option>

                            @endforeach
                          </select>
                          <span class="text-danger">  @error('category'){{ $message }} @enderror </span>

                        </div>
  
                        <div class="form-group">
                          <label>File upload</label>
                          <input type="file" name="upload_file" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info "  value=" {{$data->image }}"disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                          </div>

                        </div>
  
  
                        <div class="form-group">
                          <label for="categoryInput">Stock</label>
                          <input type="text" class="form-control  @error('stock') is-invalid @enderror" name="stock" value="{{ $data->stock }}" placeholder="product stock">
                          <span class="text-danger">  @error('stock'){{ $message }} @enderror </span>

                        </div>
  
                        <div class="form-group">
                          <label for="categoryInput">Price</label>
                          <input type="text" class="form-control   @error('price') is-invalid @enderror" name="price" value="{{ $data->price }}" placeholder="product price">
                          <span class="text-danger">  @error('price'){{ $message }} @enderror </span>

                        </div>
  
                  
                        <div class="form-group">
                          <label for="exampleTextarea1">Description</label>

                          <textarea class="form-control   @error('description') is-invalid @enderror" name="description" placeholder="write product description">{{ $data->description }}</textarea>
                          <span class="text-danger">  @error('description'){{ $message }} @enderror </span>

                        </div>
                        
                        <button type="submit" class="btn btn-primary me-2">Create</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger ml-2">Cancel</a>
                      </form>
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