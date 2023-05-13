@extends('layouts.admin')
@section('header', 'Book')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div>
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('book/'. $book->id)}}" method="post">
                @csrf
                {{ method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>ISBN</label>
                    <input maxlength="11" type="number" name="isbn" class="form-control" placeholder="Enter ISBN" required="" value="{{ $book->isbn }}">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required="" value="{{ $book->title }}">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control" placeholder="Enter Year" required="" value="{{ $book->year }}">
                    <label>Publisher ID</label>
                    <input type="number" name="publisher_id" class="form-control" placeholder="Enter Publisher ID" required="" value="{{ $book->publisher_id }}">
                    <label>Author ID</label>
                    <input type="number" name="author_id" class="form-control" placeholder="Enter Author ID" required="" value="{{ $book->author_id }}">
                    <label>Catalog ID</label>
                    <input type="number" name="catalog_id" class="form-control" placeholder="Enter Catalog ID" required="" value="{{ $book->catalog_id }}">
                    <label>QTY</label>
                    <input type="number" name="qty" class="form-control" placeholder="Enter QTY" required="" value="{{ $book->qty }}">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter Price" required="" value="{{ $book->price }}">
                 
                  </div>
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
         

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>


@endsection