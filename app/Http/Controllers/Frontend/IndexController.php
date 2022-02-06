<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyFormRequest;
use App\Http\Requests\SellFormRequest;
use App\Models\Enquiry;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;


class IndexController extends Controller
{
    public function index()
    {
        $exchanges = ['BNB','USDT','BTC','ETH','xrp','SHIBABEP','DOGE','ADA'];
        // $response = Http::withHeaders([
        //     'X-CoinAPI-Key' => 'F73B54B5-36B7-462E-A90E-E7B608033B6A'
        // ])->get('https://rest.coinapi.io/v1/assets');
        return view('frontend.index', compact('exchanges'));
    }

    public function sell()
    {
        $exchanges = ['BNB','USDT','BTC','ETH','xrp','Shiba inu','DOGE','Cardano'];
        return view('frontend.sell', compact('exchanges'));
    }


    public function submitBuy(BuyFormRequest $request)
    {
        // is wallet has sufficient amt
        $order_amt = $request->amount;
        $user_id = auth()->user()->id;
        $user_wallet_amt = Wallet::where('user_id', $user_id)->first()->amount;
        if(!($user_wallet_amt >= $order_amt))  return redirect()->back()->with('error', "You don't have sufficient amount in wallet.");
        $data = $request->all();
        //update wallet
        $data['user_id'] = $user_id;
        Wallet::updateOrCreate(
            ['user_id' => $user_id],
            ['amount' => $user_wallet_amt-$order_amt]
        );
        $storeEnquiry = Enquiry::create($data);
        return !!$storeEnquiry ?
        redirect()->back()->with('success', 'Order has been placed.') :
        redirect()->back()->with('error', "Order can't be placed.");
    }

    public function submitSell(SellFormRequest $request)
    {
        // is wallet has sufficient amt
        $order_amt = $request->amount;
        $user_id = auth()->user()->id;
        $user_wallet_amt = Wallet::where('user_id', $user_id)->first()->amount;
        if(!($user_wallet_amt >= $order_amt))  return redirect()->back()->with('error', "You don't have sufficient amount in wallet.");
        $data = $request->all();
        //update wallet
        $data['user_id'] = $user_id;
        Wallet::updateOrCreate(
            ['user_id' => $user_id],
            ['amount' => $user_wallet_amt-$order_amt]
        );
        $storeEnquiry = Enquiry::create($data);
        return !!$storeEnquiry ?
        redirect()->back()->with('success', 'Order has been placed') :
        redirect()->back()->with('error', "Prder can't be placed");
    }

    public function history()
    {
        $transactions = Enquiry::where('user_id',auth()->user()->id)->get();
        return view('frontend.history',compact('transactions'));
    }
}
