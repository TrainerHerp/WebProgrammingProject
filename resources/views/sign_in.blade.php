@extends('layouts.template')

@section('title')
  Sign In
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-4 px-5 pt-3 align-items-center rounded-1"
      style="border: solid 1px black; background-color: rgb(237, 189, 189); height: 600px">
      <h1 class="text-center">Sign In</h1>
      @if ($errors->any())
        <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
      @endif
      <form action="" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value='{{ $email }}' required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value='{{ $password }}'
            placeholder="5-20 characters" required>
        </div>
        <div class="mb-3">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Remember Me</label>
        </div>
        <div class="d-flex justify-content-center mb-5">
          <button class="btn text-center text-white" type="submit"
            style="background-color: rgb(180, 55, 55); width: 800px;">Sign
            In</button>
        </div>
        <div class="text-center">
          Not Registered Yet?
          <a href="/sign-up">Register Here</a>
        </div>
      </form>
    </div>
  </div>
@endsection
