@extends('layout')

@section('title', 'Products')

@section('content')
    <div class="list-products">
        <div class="container">
            <div class="row">
                <!-- Cart Button -->
                <div class="col-12 mb-4 d-flex justify-content-end">
                    <a href="{{ route('cart.index') }}" class="btn btn-primary">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </div>

                <!-- Create Product Button for Sellers -->
                @auth
                    @if(auth()->user()->type === 'seller')
                        <div class="col-12 mb-4">
                            <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
                        </div>
                    @endif
                @endauth

                <!-- Product List -->
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="images d-flex" style="overflow: auto;">
                                @foreach($product->images as $image)
                                    <img class="card-img-top" src="{{ asset('storage/'.$image->name) }}" alt="Product Image">
                                @endforeach
                            </div>
                            <div class="card-body">
                                @auth
                                    @if(auth()->user()->type === 'seller')
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-danger fs-4">
                                            <i class="float-end ri-edit-2-fill"></i>
                                        </a>
                                    @endif
                                @endauth
                                <div class="info text-center">
                                    <p><strong>Name:</strong> {{ $product->name }}</p>
                                    <p><strong>Info:</strong> {{ $product->info }}</p>
                                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                    <div id="cart-message" style="display:none; color: green;"></div>

                                    <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="number" name="quantity" value="1" min="1" required>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-warning">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
