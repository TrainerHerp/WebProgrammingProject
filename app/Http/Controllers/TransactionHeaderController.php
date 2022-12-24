<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
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
        $cart['transaction_date'] = Carbon::now()->toDateString();
        $cart->save();
        TransactionHeader::create(['user_id' => auth()->user()->id]);
        return redirect('/history');
    }

    public function viewHistory(){
      $transactions = TransactionHeader::where(['user_id' => auth()->user()->id, 'checkout' => true])->get();
      $listOfTransactions = [];
      foreach ($transactions as $transaction) {
        $details = TransactionDetail::where('transaction_id', $transaction->id)->get();
        $date = $transaction->transaction_date;
        $listOfItems = [];
        $total = 0;
        foreach ($details as $detail) {
          $quantity = $detail->quantity;
          $item = Item::find($detail->item_id)->first();
          $itemName = $item->name;
          $price = $quantity * $item->price;
          $total = $total + $price;
          array_push($listOfItems, ['quantity' => $quantity, 'name' => $itemName, 'price' => $price]);
        }
        array_push($listOfTransactions, ['items' => $listOfItems, 'date' => $date, 'total' => $total]);
      }
      return view('history', ['transactions' => $listOfTransactions]);
    }
}
