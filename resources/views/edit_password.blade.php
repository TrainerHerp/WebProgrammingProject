@extends('layouts.template')

@section('title')
  Edit Password
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-6 px-5 pt-3 align-items-center rounded-1"
      style="border: solid 1px black; background-color: rgb(237, 189, 189); height: 600px">
      <h1 class="text-center">Update Password</h1>
      @if ($errors->any())
        <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
      @endif
      <form action="/edit-password" method="POST" class="my-3">
        @csrf
        @method('PATCH')
        <div class="mb-2">
          <label for="old-password" class="form-label">Old Password</label>
          <input type="password" class="form-control" id="old-password" name="old_password" placeholder="(5-20 letters)"
            required>
        </div>
        <div class="mb-2">
          <label for="new-password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="new-password" name="new_password" placeholder="(5-20 letters)"
            required>
        </div>
        <div class="d-flex justify-content-center my-4">
          <button class="btn text-center text-white" type="submit" style="background-color: green; width: 800px;">Save
            Update</button>
        </div>
      </form>
      <a class="text-decoration-none text-danger" href="/profile"><button
          class="btn bg-transparent btn-outline-danger">Back</button></a>
    </div>
  </div>
@endsection
