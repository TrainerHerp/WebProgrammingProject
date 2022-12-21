<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function viewHome() {
      $items = Item::paginate(8);

      return view('home')->with('items', $items);
    }

    public function viewSearch() {
      $items = Item::paginate(8);

      return view('search')->with('items', $items);
    }

    public function viewPageSearch(Request $request) {
      $items = Item::where('name', 'like', "%$request->search%")->paginate(8);
      return view('search')->with('items', $items);
    }
}
