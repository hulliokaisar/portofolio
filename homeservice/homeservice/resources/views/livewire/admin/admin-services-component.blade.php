<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>All Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Add Service Category
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add_service')}}" class="btn btn-info pull-right">Add new</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th>Category</th>
                                            <th>Created At</th>                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $key => $service)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}" width="60"/></td>
                                                <td>{{$service->name}}</td>
                                                <td>{{$service->price}}</td>
                                                <td>
                                                    @if($service->status)
                                                    Active
                                                    @else
                                                    inactive
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($service->featured)
                                                    Yes
                                                    @else
                                                    No
                                                    @endif
                                                </td>
                                                <td>{{$service->category->name}}</td>
                                                <td>{{$service->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.edit_service',['service_slug'=>$service->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                    <a href="#" onclick="confirm('Are you sure, you want to delete this service?') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$service->id}})" class="fa fa-times fa-2x text-danger" style="margin-left:10px;"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$services->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
