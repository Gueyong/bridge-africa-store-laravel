@extends('layouts.app')

@section('content')

<div class="container">

  <h1>Welcome to Bridge Africa Store</h1>

  <p>Manage your products and showcase them to the world.</p>

  <a href="{{ route('products.index') }}" class="btn btn-primary">Go to Products</a>

  <a href="{{ route('profile.show') }}" class="btn btn-link">View Profile</a>

</div>

@endsection