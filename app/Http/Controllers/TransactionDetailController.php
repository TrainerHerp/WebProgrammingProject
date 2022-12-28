<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionDetailController extends Controller
{
    public function addItem(Request $request, $id){
        $rules = ['quantity' => 'required|numeric|min:1'];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
          return back()->withErrors($validator);
        }

        $transactionHeaderParams = ['user_id' => auth()->user()->id, 'checkout' => false];
        $transaction = TransactionHeader::where($transactionHeaderParams)->first();
        $transactionDetailParams = ['transaction_id' => $transaction['id'], 'item_id' => $id];
        $transactionDetail = TransactionDetail::where($transactionDetailParams)->first();

        if($transactionDetail) {
          $transactionDetail->quantity = $request->quantity;
          $transactionDetail->save();
        }
        else{
          TransactionDetail::create([
            'transaction_id' => $transaction['id'],
            'item_id' => $id,
            'quantity' => $request->quantity
          ]);
        }

        return redirect('/view-cart');
    }

    public function editCart(Request $request) {
      $transaction_id = $request->tid;
      $detail_id = $request->iid;

      $header = TransactionHeader::where('id', '=', $transaction_id)->get();
      $detail = TransactionDetail::where([['transaction_id', '=', $transaction_id], ['item_id', '=', $detail_id]])->get();
      $item = Item::where('id', '=', $detail_id)->get();

      return view('edit_cart', ['header' => $header, 'detail' => $detail, 'item' => $item[0]]);
    }

    public function remove(Request $request) {
      DB::table('transaction_details')->where('id', '=', $request->id)->delete();
      return redirect('/view-cart');
    }
}
