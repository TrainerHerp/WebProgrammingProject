@extends('layouts.template')

@section('title')
  Add Item
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-4 px-5 pt-3 align-items-center rounded-1"
    style="border: solid 1px black; background-color: rgb(237, 189, 189); height: 600px">
    <h1 class="text-center">Insert Item</h1>
    @if ($errors->any())
      <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
    @endif
    <form action="/add-item" method="POST" class="mt-3" enctype="multipart/form-data">
      @csrf
      <div class="mb-2">
        <label for="name" class="form-label">Clothes Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="(5-20 letters)" required>
      </div>
      <div class="mb-2">
        <label for="description" class="form-label">Clothes Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="(min 5 letters)" required>
      </div>
      <div class="mb-2">
        <label for="price" class="form-label">Clothes Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="(≥ 1000)" required>
      </div>
      <div class="mb-2">
        <label for="stock" class="form-label">Clothes Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" placeholder="(≥ 1)" required>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Clothes Image</label>
        <input type="file" class="form-control" id="image" name="image">
      </div>
      <div class="d-flex justify-content-center mb-3">
        <button class="btn text-center btn-danger" type="submit"
          style="width: 800px;">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection
