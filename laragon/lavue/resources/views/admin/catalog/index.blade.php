@extends('layouts.admin')
@section('header', 'Catalog')
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
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
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
                <a href="{{ url('catalog/create') }}" class="btn btn-sm btn-primary pull-right"> Create New Catalog</a>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 260px;">
                  <form action="/catalog" method="GET">
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
                      <th>Name</th>
                      <th>Book</th>
                      <th>Created at</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogs as $key => $catalog)
                    <tr>
                        <td class="text-center">{{ $key+1  }}</td>
                        <td>{{ $catalog->name }}</td>
                        <td>{{ count ($catalog->books) }}</td>
                        <td>{{ date ('H:i:s - d.M.Y', strtotime($catalog->created_at)) }}</td>
                        <td>{{ date ('H:i:s - d.M.Y', strtotime($catalog->updated_at))}}</td>
                        <td>
                          <a href="{{ url('catalog/'.$catalog->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>

                          <form action="{{ url('catalog',['id' => $catalog->id]) }}" method="post">
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
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
</body>
</html>

</body>
</html>


@endsection