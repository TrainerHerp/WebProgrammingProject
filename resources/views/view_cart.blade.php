@extends('layouts.template')

@section('title')
  View Cart
@endsection

@section('content')
  <h1 class="text-center">
    My Cart
  </h1>
  <div class="d-flex justify-content-end">
    <h4>Total Price: </h4>
    <button type="button" class="btn btn-primary ms-3">
      Check Out()
    </button>
  </div>
@endsection
