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
         <h1 class="page-title">Orders</h1>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Orders</li>
         </ol>
      </div>
      <!--/Page-Header-->
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">All Orders</h3>
               </div>
               <div class="card-body">
                  <div class="ads-tabs">
                     <div class="tabs-menus">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">

                           <li><a href="#" data-toggle="" id="delete-all">Delete Selected</a></li>
                        </ul>
                     </div>
                     <div class="tab-content">
                        <div class="tab-pane active table-responsive border-top userprof-tab" id="tab1">
                           <table class="table table-bordered table-hover mb-0 text-nowrap" id="example">
                              <thead>
                                 <tr>
                                    <th><input type="checkbox" class='checkall' id='checkall' value="enquiry"></th>
                                    <th>Sr No</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Wallet Address</th>
                                    <th>User Name</th>
                                    <th>Ordered At</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($enquiries as $key => $enquiry)
                                 <tr>
                                    <td><input type="checkbox" class='check' id='check' value="{{$enquiry->id}}"></td>
                                    <td>
                                       {{$key+1}}
                                    </td>
                                    <td>
                                       <div class="media mt-0 mb-0">
                                          <h4 class="font-weight-semibold">{{ $enquiry->exchange}}</h4>
                                       </div>
                                    </td>
                                    <td>{{$enquiry->amount}}</td>
                                    <td style="text-transform: capitalize;">{{$enquiry->wallet_address??''}}</td>
                                    <td>
                                       {{$enquiry->user->name}}
                                    </td>
                                    <td>{{$enquiry->created_at }}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
