<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
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

        return redirect('/home');
    }
}
