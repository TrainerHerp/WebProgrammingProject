{{-- @dd($item) --}}

@extends('layouts.template')

@section('content')
  <div class="container detail-container">
    @if ($errors->any())
      <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
    @endif
    <div class="detail">
      <img class="detail-img" src="{{ asset('img/' . $item['image']) }}" alt="Avatar" style="width:300px; height:300px">
      <div class="detail-content">
        <h4><b>{{ $item->name }}</b></h4>
        <h5>Rp.{{ $item->price }}</h5>
        <br>
        <h5><b>Product Detail</b></h5>
        <p>{{ $item->description }}</p>
        <hr>
        <label class="sr-only" for="quantity">Quantity</label>
        <form class="form-inline" method="POST" action="/detail/{{ $item['id'] }}">
          @csrf
          <input type="number" class="form-control mb-2 mr-sm-2" style="width: 70%; margin-right:5px" id="quantity"
            name="quantity" placeholder="Enter new quantity...">
          <button type="submit" class="btn btn-success btn-update">Update Cart</button>
        </form>
        <a href="/view-cart" class="text-decoration-none text-white"><button type="button"
            class="btn btn-danger btn-back">Back</button></a>
      </div>
    </div>
  </div>
@endsection
