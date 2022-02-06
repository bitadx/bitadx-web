
<!DOCTYPE html>
<html lang="en">
    <!--Head Links-->
    @include('frontend.layout.head-links')
    <body>
                <!-- Sidebar menu-->

                <section class="main_body"><!------ Main Body Start ----->
		  <div class="container">
			  <div class="row">
				 @include('frontend.layout.sidebar')
				  <div class="col-lg-8">
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
					  <div class="exnchange_box" style="background-color: white;">
                      <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Exchange</th>
        <th>Wallet Address</th>
        <th>Amount</th>
        <th>Current Price</th>
        <th>You Get</th>
        <th>Order Type</th>
      </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
      <tr>
        <td>{{$transaction->exchange}}</td>
        <td>{{$transaction->wallet_address}}</td>
        <td>{{$transaction->amount}}</td>
        <td>{{$transaction->current_price}}</td>
        <td>{{$transaction->get_amount}}</td>
        <td>{{$transaction->order_type}}</td>
      </tr>
    @endforeach

    </tbody>
  </table>
</div>

					  </div>
				  </div>
			  </div>
		  </div>
	  </section><!------ Main Body End ----->

    </body>
</html>

