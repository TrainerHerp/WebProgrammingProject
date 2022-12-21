@extends('layouts.template')

@section('content')
    <div class="container detail-container">
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
              <form class="form-inline">
                <input type="text" class="form-control mb-2 mr-sm-2" style="width: 70%; margin-right:5px" id="quantity" placeholder="Enter quantity...">
                <button type="button" class="btn btn-success btn-update">Update Cart</button>
              </form>
              <button type="button" class="btn btn-danger btn-back">Back</button>
            </div>
        </div>
    </div>
@endsection
