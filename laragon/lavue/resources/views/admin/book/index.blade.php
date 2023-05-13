@extends('layouts.admin')
@section('header', 'Book')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ url('book/create') }}" class="btn btn-sm btn-primary pull-right"> Create New book</a>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 260px;">
                  <form action="/book/show" method="GET">
                    <input type="text" name="show" placeholder="Search .." value="{{ old('show') }}">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>ISBN</th>
                      <th>Title</th>
                      <th>Year</th>
                      <th>Publisher ID</th>
                      <th>Author ID</th>
                      <th>Catalog ID</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $key => $book)
                    <tr>
                        <td class="text-center">{{ $key+1  }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->year }}</td>
                        <td class="text-center">{{ $book->publisher_id}}</td>
                        <td class="text-center">{{ $book->author_id}}</td>
                        <td class="text-center">{{ $book->catalog_id}}</td>
                        <td class="text-center">{{ $book->qty }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ date ('H:i:s - d.M.Y', strtotime($book->created_at)) }}</td>
                        <td>{{ date ('H:i:s - d.M.Y', strtotime($book->created_at)) }}</td>
                        <td>
                          <a href="{{ url('book/'.$book->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>

                          <form action="{{ url('book',['id' => $book->id]) }}" method="post">
                            <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are You Sure?')">
                            @method('delete')
                            @csrf
                          </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
</body>
</html>

</body>
</html>


@endsection