{{-- @dd($cart) --}}

@extends('layouts.template')

@section('title')
  View Cart
@endsection

@section('content')
  <h1 class="text-center">
    My Cart
  </h1>
  @if (sizeof($cart) > 0)
    <div class="d-flex justify-content-end">
      <h4>Total Price: {{ $total }}</h4>
      <form action="/checkout" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary ms-3">
          Check Out({{ sizeof($cart) }})
        </button>
      </form>
    </div>
    @foreach ($cart as $post)
      <div class="transaction-card" style="...">
        <img class="transaction-card-img" src="{{ asset('img/' . $post['item']->image) }}" alt="Image Not Found" style="...">
        <div class="transaction-card-body">
          <h5 class="transaction-card-title">{{ $post['item']->name }}</h5>
          <p class="transaction-card-text">Rp.{{ $post['item']->price }}</p>
          <p class="transaction-card-text">Qty : {{ $post['detail']->quantity }}</p>
          <div class="cart-buttons">
            <a href="/edit-cart?tid={{{ $post['detail']->transaction_id }}}&iid={{{ $post['item']->id }}}" type="submit" class="btn btn-success w-50 cart-button">Edit Item</a>
            {{-- <p>{{ $post['detail']->id }}</p> --}}
            <form action="/remove/{{ $post['detail']->id }}" method="POST">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger w-50 cart-button">Delete</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  @else
    <h2 class="mt-5 text-center">Cart is empty!</h2>
  @endif
@endsection
