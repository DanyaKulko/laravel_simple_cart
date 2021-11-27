@extends('layouts.default_layout')

@section('title', $product->name)

@section('main_content')
    {{ $product->category->category_name }}
@endsection
