@extends('layouts.template')

@section('title')
  Welcome
@endsection

@section('content')
  <h1>Welcome</h1>
  {{-- To Change href --}}
  <a href="./sign-up">Sign Up</a>
  <a href="./sign-in">Sign In</a>
@endsection
