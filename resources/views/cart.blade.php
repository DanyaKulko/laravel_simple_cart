@extends('layouts.default_layout')

@section('title', 'Корзина')

@section('main_content')
    <div class="cart_block">
        @isset($order->products)
            @foreach($order->products as $key => $product)
                <div class="cart_item">
                    <div class="cart_counter">
                        {{ $key+1 }}.
                    </div>
                    <div class="cart_title">
                        {{ $product->name }}
                    </div>
                    <div class="cart_price">
                        Price:
                        {{ $product->price }}$ ({{ $product->id }})
                    </div>
                    <div class="cart_product_count">
                        Count:
                        {{ $product->pivot->qty }}
                    </div>
                    <div class="buttons">
                        <form action="{{ route('cartRemove', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">-</button>
                        </form>
                        <form action="{{ route('cartAdd', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">+</button>
                        </form>
                    </div>
                    <div class="cart_total_price">
                        Cost:
                        {{ $product->getPriceByCount() }}$
                    </div>
                </div>
            @endforeach
            <div class="confirm_order">
                <form action="{{ route('cartCheckout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Зробити замовлення">
                </form>
            </div>
        @endisset
    </div>
@endsection
