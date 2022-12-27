@extends('layouts.template')

@section('title')
  Edit Profile
@endsection

@section('content')
  <div class="row justify-content-center sheet">
    <div class="col-6 px-5 pt-3 align-items-center rounded-1"
      style="border: solid 1px black; background-color: rgb(237, 189, 189); height: 600px">
      <h1 class="text-center">Update Profile</h1>
      @if ($errors->any())
        <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
      @endif
      <form action="/edit-profile" method="POST" class="mt-3">
        @csrf
        @method('PATCH')
        <div class="mb-2">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="(5-20 letters)"
            value="{{ $username }}" required>
        </div>
        <div class="mb-2">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $email }}" required>
        </div>
        <div class="mb-2">
          <label for="phone_number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $phone_number }}"
            placeholder="(10-13 numbers)" required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="{{ $address }}"
            placeholder="(min 5 letters)" required>
        </div>
        <div class="d-flex justify-content-center my-4">
          <button class="btn btn-outline-success" type="submit" style="width: 800px;">Save
            Update</button>
        </div>
      </form>
      <a class="text-decoration-none btn btn-outline-danger" href="/profile">Back</a></button>
    </div>
  </div>
@endsection
