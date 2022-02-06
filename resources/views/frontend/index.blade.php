
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
					  <div class="exnchange_box">
						  <div class="exnchange_box_item">
							  <div class="exnchange_box_item_inner">
								<div class="exnchange_box_item_inner_dropdown">
  									<span>Buy<i class="fas fa-chevron-down"></i></span>
								  <div class="exnchange_box_item_inner_dropdown_content">
                                  <!-- <a href="{{ url('/') }}">Buy</a> -->
                                  <a href="{{ url('sell') }}">Sell</a>
								  </div>
								</div>
							  </div>
						  </div>
						  <div class="exnchange_box_item2">
							  <form class="exnchange_box_item2_form" method="post" action="{{ url('buy-currency') }}">
                              @csrf
								  <div class="item2_form_inner">
									  <p>Currency</p>
									  <label class="item2_form_inner_lab"><i class="fas fa-chevron-down"></i></label>
										<select id="btc" name="exchange">
                                            <option>Select Exchange</option>
                                        @foreach($exchanges as $exchange)
											<option value="{{$exchange}}">{{ $exchange }}</option>
                                        @endforeach
										</select>
								  </div>
								  <div class="item2_form_inner item2_form_inner2">
									  <label class="item2_form_inner_lab"><i class="fas fa-chevron-down"></i></label>
									  <input type="number" placeholder="Amount (INR)" name="amount" id="amount">
								  </div>
								  <div class="item2_form_inner item2_form_inner3">
									  <input type="text" placeholder="Your Wallet address" name="wallet_address">
                                      <input type="text" value="buy" name="order_type" hidden>
								  </div>

								  <div class="item2_form_inner item2_form_inner4">
                                  <p>Current Price<span id="price"></span><text>Valid For <emashish id="timer">10s</emashish></text></p>
									  <p class="item2_form_inner4_text1">You get<span id="get-price"></span></p>
                                      <input type="text" id="current-price" name="current_price" hidden/>
                                      <input type="text" id="get-amount" name="get_amount" hidden/>
									  <!-- <p class="item2_form_inner4_text2">Total<span>25,500.00 INR</span></p> -->
								  </div>

								  <div class="item2_form_inner item2_form_inner5">
								  	<button type="submit">Proceed</button>
								  </div>
							  </form>
							  <div class="exnchange_box_item3">
								  <h5>Payment Methods</h5>
								  <a href="#"><img src="frontend/images/wallet.png" alt="images"/>&nbsp; Wallet</a>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </section><!------ Main Body End ----->

    </body>
</html>
<script>
$(document).ready(function(){
    function updateCalc()
    {
        let amt = $('#amount').val();
        let ex_price = $('#price').text();
        if(amt && ex_price)
        {
            let you_get = ex_price/(amt-30);
            $('#get-price').text(you_get);
            $('#get-amount').val(you_get);
        }
    }
    function loadCounts() {
        var currency = $('#btc').val();
        var api_url = `https://rest.coinapi.io/v1/assets/${currency}`;
        $.ajax({
            type: "get",
            url: api_url,
            headers: {
                'X-CoinAPI-Key' : 'F73B54B5-36B7-462E-A90E-E7B608033B6A'
            },
            success: function (res) {
                debugger
                var price = res[0].price_usd;
                $('#price').text(price);
                $('#current-price').val(price);
                updateCalc();
            },
            error: function (error) {

            }
        })
        return true;
   }
    $('#btc').on('change', function(){
        loadCounts();
    });
    $('#amount').on('change',function(){
        updateCalc();
    });



//load reply on a interval
setInterval(function() {
    let amt = $('#amount').val();
    let ex_price = $('#price').text();
    var timeleft = 10;

    if(amt && ex_price)
    {
        var downloadTimer = setInterval(function(){
        timeleft--;
        document.getElementById("timer").textContent = timeleft;
        if(timeleft <= 0)
            clearInterval(downloadTimer);
        }
        ,1000);
        loadCounts();
    }
   }, 10000)
});

</script>
