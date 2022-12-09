@extends('layouts.template')

@section('title')
  Home
@endsection

@section('content')
  <h1>Home</h1>
  <div>
    {{-- Class / CSS require fixing --}}
    @foreach ($items as $product)
            <div class="col">
                <div class="card h-100 text-white text-center bg-dark mb-3" style="...">
                    <img class="card-ing-top" src="{{ url($product->image) }}" alt="Image Not Found" style="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp.{{ $product->price }}</p>
                    </div>
                    <div class="flex">
                        {{-- UPDATE --}}
                        <a href="/updateProduct/{{ $product->id }}" type="submit" class="btn btn-primary w-50">More Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
  </div>
@endsection
