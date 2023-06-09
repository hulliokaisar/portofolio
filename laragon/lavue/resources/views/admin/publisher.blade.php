@extends('layouts.admin')
@section('header', 'Publisher')
@section('css')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<div id="controller" class="container-fluid">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form :action="actionUrl" method="post" autocomplete="off">
              <div class="modal-header">
                <h4 class="modal-title">Publisher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @csrf
                <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input maxlength="64" type="text" name="name" class="form-control" :value="data.name" placeholder="Enter Name" required="">
                    <label>Email</label>
                    <input maxlength="64" type="text" name="email" class="form-control" :value="data.email" placeholder="Enter Email" required="">
                    <label>Phone_number</label>
                    <input maxlength="14" type="number" name="phone_number" class="form-control" :value="data.phone_number" placeholder="Enter Phone Number" required="">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" :value="data.address" placeholder="Enter Address" required="">
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>      
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable();
  });

  var actionUrl = '{{ url('publisher') }}';
  var apiUrl = '{{ url('api/publisher')}}';

  var columns = [
    {data: 'DT_RowIndex', class:'text-center', orderable: true},
    {data: 'name', class: 'text-center', orderable: true},
    {data: 'email', class: 'text-center', orderable: true},
    {data: 'phone_number', class: 'text-center', orderable: true},
    {data: 'address', class: 'text-center', orderable: true},
    {render: function (index, row, data, meta) {
      return `
      <a href="#" class="btn btn-sm btn-primary" onclick="controller.editData(event, ${meta.row})">Edit</a>
      <a class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">Delete</a>
      `;
    }, orderable: false, width: '200px', class:'text-center'},
  ];

  


</script>
<script src="{{ asset('js/data.js')}}"></script>

  <!-- Page specific script -->

@endsection