@extends('layouts.template')

@section('content')
  <div class="container detail-container">
    @if ($errors->any())
      <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
    @endif
    <div class="detail">
      <img class="detail-img" src="{{ asset('img/' . $detail['image']) }}" alt="Avatar" style="width:300px; height:300px">
      <div class="detail-content">
        <h4><b>{{ $detail['name'] }}</b></h4>
        <h5>Rp.{{ $detail['price'] }}</h5>
        <br>
        <h5><b>Product Detail</b></h5>
        <p>{{ $detail['description'] }}</p>
        <br>
        <label class="sr-only" for="quantity">Quantity</label>
        <form class="form-inline" method="POST" action="/detail/{{ $detail['id'] }}">
          @csrf
          <input type="number" class="form-control mb-2 mr-sm-2" style="width: 70%; margin-right:5px" id="quantity"
            name="quantity" placeholder="Enter quantity...">
          <button type="submit" class="btn btn-success btn-update">Update Cart</button>
        </form>
        <button type="button" class="btn btn-danger btn-back"><a href="/home"
            class="text-decoration-none text-white">Back</a></button>
      </div>
    </div>
  </div>
@endsection
