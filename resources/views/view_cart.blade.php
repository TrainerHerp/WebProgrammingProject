@extends('layouts.template')

@section('title')
  View Cart
@endsection

@section('content')
  <h1 class="text-center">
    My Cart
  </h1>
  @if ($items->count())
    <div class="d-flex justify-content-end">
      <h4>Total Price: {{ $total }}</h4>
      <form action="/view-cart" method="POST">
        @csrf
        <button type="button" class="btn btn-primary ms-3">
          Check Out({{ $items->count() }})
        </button>
      </form>
    </div>
    @foreach ($items as $item)
    @endforeach
  @else
    <h2>Cart is empty!</h2>
  @endif
@endsection
