@extends('backend.layout.app') @section('content')
<div class="app-content my-3 my-md-5">
    <div class="side-app">
        @if (session('success'))
        <div class="alert alert-dismissible alert-success">
            <button class="close" type="button" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-dismissible alert-danger">
            <button class="close" type="button" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
        @endif
         @if (count($errors)>0)
        <div class="alert alert-dismissible alert-danger">
            <button class="close" type="button" data-dismiss="alert">×</button>
            @foreach($errors->all() as $error)
            <ul>
                <li>
                    {{ $error }}
                </li>
            </ul>
            @endforeach
        </div>

        @endif

        <!--Page-Header-->
        <div class="page-header">
            <h1 class="page-title">Products</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Products</li>
            </ol>
        </div>
        <!--/Page-Header-->

        <!-- Latest User Details -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                    </div>

                    <div class="card-body">
                        <div class="ads-tabs">
                            <div class="tabs-menus">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab1" class="active" data-toggle="tab">All Products {{"(".count($courses).")"}}</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Active {{"(".count($activeCourses).")"}}</a></li>
                                    <li><a href="#tab3" data-toggle="tab">InActive {{"(".count($inActiveCourses).")"}}</a></li>
                                    <li><a href="#tab5" data-toggle="tab">Featured</a></li>
                                    <li><a href="#" data-toggle="" id="delete-all">Delete Selected</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive border-top userprof-tab" id="tab1">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap display nowrap" id="example">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class='checkall' id='checkall' value="course"></th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <!-- <th>Product Availability</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $key => $course)
                                            <tr>
                                                <td><input type="checkbox" class='check' id='check' value="{{$course->id}}"></td>

                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <h4 class="font-weight-semibold">{{ $course->course_title}}</h4>
                                                    </div>
                                                </td>
                                                <td>{{$course->category->category}}</td>

                                                <!-- <td>
                                                {{$course->availability == 0 ? "Out of Stock":"In Stock"}}
                                                </td> -->
                                                <!-- <td>{{$course->status == 0 ? "Inactive":"Active"}}</td> -->
                                                <td>
                                                <a href="{{url('/admin/products/'.$course->id.'/edit')}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>


														<form method="post" action="{{url('/admin/products/'.$course->id)}}">
														@csrf
														@method('delete')
														<button type="submit" class="btn btn-danger btn-sm text-white warning" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
														</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab2">
                                <table class="table table-bordered table-hover mb-0 text-nowrap display nowrap" id="example">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Course Title</th>
                                                <th>Category</th>
                                                <th>User</th>
                                                <th>Course Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activeCourses as $key => $course)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>

                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <h4 class="font-weight-semibold">{{ $course->course_title}}</h4>
                                                    </div>
                                                </td>
                                                <td>{{$course->category->category}}</td>

                                                <td>
                                                    {{$course->user_enrolled}}
                                                </td>
                                                <td>{{$course->status == 0 ? "Inactive":"Active"}}</td>
                                                <td>
                                                <a href="{{url('/admin/courses/'.$course->id.'/edit')}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>


														<form method="post" action="{{url('/admin/courses/'.$course->id)}}">
														@csrf
														@method('delete')
														<button type="submit" class="btn btn-danger btn-sm text-white warning" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
														</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab3">
                                <table class="table table-bordered table-hover mb-0 text-nowrap display nowrap" id="example">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Course Title</th>
                                                <th>Category</th>
                                                <th>User</th>
                                                <th>Course Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inActiveCourses as $key => $course)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>

                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <h4 class="font-weight-semibold">{{ $course->course_title}}</h4>
                                                    </div>
                                                </td>
                                                <td>{{$course->category->category}}</td>

                                                <td>
                                                    {{$course->user_enrolled}}
                                                </td>
                                                <td>{{$course->status == 0 ? "Inactive":"Active"}}</td>
                                                <td>
                                                <a href="{{url('/admin/courses/'.$course->id.'/edit')}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>


														<form method="post" action="{{url('/admin/courses/'.$course->id)}}">
														@csrf
														@method('delete')
														<button type="submit" class="btn btn-danger btn-sm text-white warning" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
														</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab5">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap" id="example3">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Course Title</th>
                                                <th>Category Category</th>
                                                <th>Course Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="card-aside-img"></div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-2">
                                                                <a href="#" class="text-dark">
                                                                    <h4 class="font-weight-semibold"></h4>
                                                                </a>
                                                                <a href="#"><i class="fa fa-clock-o mr-1"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <h4 class="font-weight-semibold"></h4>
                                                    </div>
                                                </td>

                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Latest User Details -->
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
