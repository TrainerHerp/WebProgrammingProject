<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TransactionHeader;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    public function viewCart() {
        $params = ['user_id' => auth()->user()->id, 'checkout' => false];
        $curTransaction = TransactionHeader::where($params)->with('transaction_details')->first();
        $cart = [];
        $total = 0;
        if ($curTransaction->count()) {
            $details = $curTransaction->transaction_details;
            foreach ($details as $detail) {
                $item = Item::find($detail->item_id)->first();
                $total = $total + $detail->quantity * $item->price;
                array_push($cart, ['detail' => $detail, 'item' => $item]);
            }
        }
        return view('view_cart', ['total' => $total, 'cart' => $cart]);
    }

    public function checkout(Request $request) {
        $params = ['user_id' => auth()->user()->id, 'checkout' => false];
        $cart = TransactionHeader::where($params)->first();
        $cart['checkout'] = true;
        $cart['transaction_date'] = Carbon::now();
        TransactionHeader::create(['user_id' => auth()->user()->id]);
        return redirect('/history');
    }
}
