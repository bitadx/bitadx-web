@extends('backend.layout.app')
@section('content')
<!--App-Content-->
<div class="app-content  my-3 my-md-5">
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
			<h1 class="page-title">Users</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Users</li>
			</ol>
		</div>
		<!--/Page-Header-->



		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="text-wrap mt-6">
					<div class="">
						<div class="btn-list text-center">
							<!-- <a href={{url('admin/categories/create')}} class="btn btn-primary waves-effect waves-light">Add New Categories</a> -->
						</div>
						<div class="col-lg-12 col-md-12">
							<!-- <form class="form-inline float-right mb-4">
								<div class="nav-search ">
									<input type="search" class="form-control" placeholder="Search Categories…" aria-label="Search">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
								</div>
							</form> -->
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Latest User Details -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Users</h3>
					</div>
					<div class="card-body">
					<div class="ads-tabs">
						<div class="tabs-menus">
							<!-- Tabs -->
							<ul class="nav panel-tabs">
								<li><a href="#" data-toggle="" id="delete-all">Delete Selected</a></li>
							</ul>
						</div>
					</div>
						<div class="table-responsive border-top">
							<table class="table table-bordered table-hover mb-0 text-nowrap display nowrap" id="table">
								<thead>
									<tr>
										<th><input type="checkbox" class='checkall' id='checkall' value="category"></th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact No.</th>
										<!-- <th>Status</th> -->
                                        <th>Wallet Amount</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td><input type="checkbox" class='check' id='check' value="{{$user->id}}"></td>
										<td>{{$user->name}}</td>
										<td>{{ $user->email}}</td>
                                        <td>{{ $user->contact_no}}</td>
                                        <td>{{ $user->wallet->amount ?? '0' }}</td>
										<!-- <td>{{ $user->active == 0 ? "Inactive":"Active"}}</td> -->
										<td>
											<!-- <a href={{ url('/admin/users/'.$user->id.'/edit')}} class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a> -->


											<!-- <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a> -->

											<form method="post" action={{ url('/admin/users/'.$user->id)}}>
												@csrf
												@method('delete')
												<button type="submit" class="btn btn-danger btn-sm text-white warning" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
											</form>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal-{{$user->id}}">Update Wallet</button>
                                             <!-- Modal -->
  <div class="modal fade" id="myModal-{{$user->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <form method="POST" action={{ url('admin/update-wallet') }}>
                @csrf
                <div class="form-group">
                    <div class="row align-items-center">
                        <label class="col-sm-3">Enter Amount</label>
                        <div class="col-sm-9">
                            <input type="number" name="amount" class="form-control" required value="{{$user->wallet->amount??'0'}}">
                            <input type="number" name="user_id" value="{{$user->id}}" hidden>
                        </div>
                    </div>
                </div>
                <div class="btn-list mt-4 text-right">
                    <button type="submit" class="btn btn-primary btn-space">Update</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Latest User Details -->
	</div>
</div>
</div>
@endsection
