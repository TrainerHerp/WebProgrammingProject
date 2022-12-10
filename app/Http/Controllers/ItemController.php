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
}
