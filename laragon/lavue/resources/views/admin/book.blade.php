@extends('layouts.admin')

@section('header', 'Book')

@section('content')

<div id="controller">
  <div class="row">
    <div class="col-md-5 offset-md-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
          <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
      </div>
    </div>

    <div class="col-md-2">
      <button  class="btn btn-primary" @click="addData()">Create New Book</button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
      <div class="info-box" v-on:click="editData(book)">
        <div class="info-box-content">
          <span class="info-box-text h3">@{{ book.title}} (@{{ book.qty }})</span>
          <span class="info-box-number">Rp. @{{ numberWithSpaces(book.price) }},-<small></small></span>
        </div>
      </div> 
    </div>
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post" autocomplete="off">
          <div class="modal-header">
            <h4 class="modal-title">Book</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @csrf

            <input type="hidden" name="_method" value="POST" v-if="editStatus">

            <div class="card-body">
              <div class="form-group">
                <label>ISBN</label>
                <input maxlength="11" type="number" name="isbn" class="form-control"  placeholder="Enter ISBN" :value="book.isbn" required="">
                <label>Title</label>
                <input maxlength="64" type="text" name="title" class="form-control"  placeholder="Enter Title" :value="book.title" required="">
                <label>Year</label>
                <input maxlength="11" type="number" name="year" class="form-control"  placeholder="Enter Year" :value="book.year" required="">
                <label>Publisher ID</label>
                <select name="publisher_id" class="form-control" :value="book.publisher_id">
                  @foreach ($publishers as $publisher)
                      <option :selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                  @endforeach
                </select>
                <label>Author ID</label>
                <select name="author_id" class="form-control" :value="book.author_id">
                  @foreach ($authors as $author)
                      <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                  @endforeach
                </select>
                <label>Catalog ID</label>
                <select name="catalog_id" class="form-control" :value="book.catalog_id">
                  @foreach ($catalogs as $catalog)
                      <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                  @endforeach
                </select>
                <label>QTY</label>
                <input maxlength="11" type="number" name="qty" class="form-control"  placeholder="Enter QTY" :value="book.qty" required="">
                <label>Price</label>
                <input maxlength="11" type="number" name="price" class="form-control"  placeholder="Enter Price" :value="book.price" required="">
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
            <button type="submit" class="btn btn-primary" v-on:click="editData2(book.id)">Save Change</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

  var actionUrl = '{{url ('book') }}';
  var apiUrl = '{{url ('api/book') }}';

  var app = new Vue({
    el: '#controller',
    data: {
     books: [],
     search: '',
     book:{},
     editStatus: false,
  }, 
    mounted: function () {
      this.get_books();
    },
    methods: {
      addData(){
        this.book = {};
        this.editStatus = false;
        $('#modal-default').modal();
      }, 
      editData(book){
        this.book = book;
        this.actionUrl = '{{ url('book') }}'+'/'+book.id;
        this.editStatus = true;
        $('#modal-default').modal();
        
      },
      editData2(id){
        this.actionUrl = '{{ url('book') }}'+'/'+id;
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {location.reload()
            });
          
        },
      deleteData(id){
        this.actionUrl = '{{ url('book') }}'+'/'+id;
          if (confirm("Are You Sure?")) {
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {location.reload()
            });
          }
        },
      
        get_books() {
          const _this = this;
            $.ajax({
              url: apiUrl,
              method: 'GET',        
              success: function (data) {
              _this.books = JSON.parse(data);
              },
              error: function (error) {
                console.log(error);
              }
        });
        },
        numberWithSpaces(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        },
        computed: {
          filteredList() {
            return this.books.filter(book => {
              return book.title.toLowerCase().includes(this.search.toLowerCase())
            })
          }
        }
        
  });

</script>
@endsection