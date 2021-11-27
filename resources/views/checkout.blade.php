@extends('layouts.default_layout')

@section('title', 'Замовлення')

@section('main_content')
  <div class="checkout">
      <div class="title">
          Замовлення
      </div>
      <div class="total_sum">
          Price: {{ $order->getTotalPrice() }}$
      </div>
      <form action="{{ route('checkoutConfirm') }}" method="POST">
          @csrf
          <input type="text" name="name" placeholder="Name">
          <input type="text" name="address" placeholder="Address">
          <input type="text" name="phone" placeholder="Phone">
          <input type="submit" value="Go to payment page">
      </form>
  </div>
@endsection
