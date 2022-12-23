@extends('layouts.template')

@section('title')
  Transaction History
@endsection

@section('content')
  <h1 class="text-center mb-4">
    Check What You've Bought!
  </h1>
  @foreach ($transactions as $transaction)
    <div class="container my-3 rounded-1 py-3" style="background-color: lightgray; border: 1px solid gray">
      <h5><strong>{{ $transaction['date'] }}</strong></h5>
      <ul>
        @foreach ($transaction['items'] as $item)
          <li class="mt-1">
            {{ $item['quantity'] }} pc(s) {{ $item['name'] }} &nbsp &nbsp &nbsp Rp.{{ $item['price'] }}
          </li>
        @endforeach
      </ul>
      <h5><strong>Total Price {{ $transaction['total'] }}</strong></h5>
    </div>
  @endforeach
@endsection
