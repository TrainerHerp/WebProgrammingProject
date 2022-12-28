<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function viewHome() {
      $items = Item::paginate(8);

      return view('home')->with('items', $items);
    }

    public function viewDetail(Request $request) {
      $detail = Item::find($request->id);

      return view('detail', ['detail'=>$detail]);
    }

    public function viewSearch() {
      $items = Item::paginate(8);

      return view('search')->with('items', $items);
    }

    public function viewPageSearch(Request $request) {
      $items = Item::where('name', 'like', "%$request->search%")->paginate(8);
      return view('search')->with('items', $items);
    }

    public function deleteItem(Request $request) {
      $item = Item::find($request->id);
      $item->delete();

      return redirect('/home');
    }

    public function viewAddItem() {
      return view('add_item');
    }

    public function addItem(Request $request) {
      $rules = [
        'name' => 'required|min:5|max:20',
        'description' => 'required|min:5',
        'price' => 'required|numeric|min:1000',
        'stock' => 'required|numeric|min:1',
        'image' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      $image = $request->file('image');
      $imageName = $image->getClientOriginalName();

      Storage::putFileAs('public/img', $image, $imageName);
      $imageUrl = $imageName;

      Item::create([
          'name' => $request->name,
          'description' => $request->description,
          'image' => $imageUrl,
          'price' => $request->price,
          'stock' => $request->stock,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
      ]);
      return redirect('/home');
    }
}
