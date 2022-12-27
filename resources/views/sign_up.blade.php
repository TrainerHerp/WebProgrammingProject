@extends('layouts.template')

@section('title')
  Sign Up
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-4 px-5 pt-3 align-items-center rounded-1"
      style="border: solid 1px black; background-color: rgb(237, 189, 189); height: 600px">
      <h1 class="text-center">Sign Up</h1>
      @if ($errors->any())
        <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
      @endif
      <form action="/sign-up" method="POST" class="mt-3">
        @csrf
        <div class="mb-2">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="(5-20 letters)" required>
        </div>
        <div class="mb-2">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-2">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="(5-20 letters)"
            required>
        </div>
        <div class="mb-2">
          <label for="phone_number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="(10-13 numbers)"
            required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="(min 5 letters)" required>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <button class="btn text-center btn-danger" type="submit"
            style="width: 800px;">Submit</button>
        </div>
        <div class="text-center">
          Already Registered?
          <a href="/sign-in">Sign In Here</a>
        </div>
      </form>
    </div>
  </div>
@endsection
