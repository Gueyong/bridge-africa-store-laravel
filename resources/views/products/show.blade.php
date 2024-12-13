@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $product->name }}</h3>
            <p class="card-text">{{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
        </div>
    </div>

    <!-- Show Edit link only if the logged-in user is the author -->
    @if(auth()->id() === $product->user_id)
        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary mt-3">Edit Product</a>
    @endif

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
</div>
@endsection
