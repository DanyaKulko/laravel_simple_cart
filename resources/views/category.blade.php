@extends('layouts.default_layout')

@section('title', $category->category_name)

@section('main_content')
    <div class="products_block">
    @foreach($category->products as $product)

        <div class="product_single">
            <div class="title">
                {{ $product->name }}
            </div>
            <div class="description">
                {{ $product->description }}
            </div>
            <div class="vendor_code">
                {{ $product->vendor_code }}
            </div>
            <div class="buttons">
                <form action="{{ route('cartAdd', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>
            <br>
    @endforeach
    </div>
@endsection
