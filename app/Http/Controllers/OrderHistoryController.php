<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /*
    * POST
    * first step of buying, redirect to summary payment page.
    */
    public function buy(Request $request)
    {
        $buyData = collect($request->validate([
            'slug' => 'required',
            'eventDate' => 'required|date|after:tomorrow'
        ]));

        return redirect()->route('buy-summary')->with('buyData', $buyData);
    }

    /*
    * GET
    * summary-buy view
    */
    public function buy2View()
    {
        $buyData = session("buyData");

        if ($buyData == null) {
            return redirect('/')->with('error', "Select a product first then you can view the summary-buy page");
        }

        $product = Product::where('slug', $buyData->get('slug'))->with('merchant')->first();
        if ($product == null) {
            return redirect()->back()->with('error', 'Product not found, bad request');
        }

        return view('order_history.buy-summary', [
            'eventDate' => $buyData->get('eventDate'),
            'product' => $product
        ]);
    }

    /*
    * POST
    * summary-buy process, creates a new order history 
    * TODO: payment gateway
    */
    public function buy2ViewPost(Request $request)
    {
        $buyData = collect($request->validate([
            'slug' => 'required',
            'eventDate' => 'required|date|after:tomorrow'
        ]));

        $product = Product::where('slug', $buyData->get('slug'))->with('merchant')->first();
        $user = auth()->user();

        if ($product->merchant->id == $user->id) {
            return redirect('/')->with('error', "Merchant can't buy it's own products");
        }

        $slug = unique_random('order_histories', 'slug', 15);
        if (OrderHistory::where('slug', $slug)->first() != null) {
            return redirect()->route('product')->with('error', 'Server error while creating order, please try again');
        }

        //new order history
        $oh = OrderHistory::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'event_date' => $buyData->get('eventDate'),
            'slug' => $slug,
            'is_done' => 'false'
        ]);

        return redirect("/oh-buy-payment/$slug");
    }



    function paymentView($slug)
    {
        $orderHistory = OrderHistory::where('slug', $slug)->first();
        if ($orderHistory == null) {
            return redirect()->back()->with('error', "Order history doesn't exists");
        } elseif (auth()->user()->id != $orderHistory->user_id) {
            return redirect()->back()->with('error', "Order history doesn't exists..");
        }

        return view('order_history.payment', [
            'orderHistory' => $orderHistory,
        ]);
    }


    //TODO: fix method
    function historyView()
    {
        $user = auth()->user();
        $orderHistories = OrderHistory::where('user_id', $user->id)->with('product');

        return view('history', [
            'orderHistories' => $orderHistories->get(),
        ]);
    }
}
