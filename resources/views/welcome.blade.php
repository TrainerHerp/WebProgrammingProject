@extends('layouts.template')

@section('title')
  Welcome
@endsection

@section('content')
  @auth
  <div class="welcome-case">
    <h1 class="head">WELCOME TO MAI BOUTIQUE</h1>
    <h5 class="welcome-text">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</h5>
  </div>
  @endauth

  @guest
    <div class="welcome-case">
      <h1 class="head">WELCOME TO MAI BOUTIQUE</h1>
      <h5 class="welcome-text">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</h5>
      <div class="welcome-sign-in-up">
        <a href="./sign-up" class="btn btn-light welcome-sign">Sign Up</a>
        <a href="./sign-in" class="btn btn-light welcome-sign">Sign In</a>
      </div>
    </div>
  @endguest
@endsection
