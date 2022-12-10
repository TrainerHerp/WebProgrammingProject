<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    public function viewCart() {
        $cart = TransactionHeader::with('transaction_details')->get();
        $total = 0;
        if ($cart->count()) {
            foreach ($cart as $item) {
                $total = $total + $item->qty * $item->item->price;
            }
        }
        return view('view_cart', ['total' => $total, 'items' => $cart]);
    }
}
