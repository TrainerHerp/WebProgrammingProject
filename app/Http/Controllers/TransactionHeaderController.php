<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    public function viewCart() {
        $params = ['user_id' => auth()->user()->id, 'checkout' => false];
        $cart = TransactionHeader::where($params)->with('transaction_details')->get();
        $total = 0;
        if ($cart->count()) {
            foreach ($cart as $item) {
                $total = $total + $item->qty * $item->item->price;
            }
        }
        return view('view_cart', ['total' => $total, 'items' => $cart]);
    }

    public function checkout(Request $request) {
        $params = ['user_id' => auth()->user()->id, 'checkout' => false];
        $cart = TransactionHeader::where($params)->get();
        $cart['checkout'] = true;
        TransactionHeader::create(['user_id' => auth()->user()->id]);
        return redirect('/history');
    }
}
