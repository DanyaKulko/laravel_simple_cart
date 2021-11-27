<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller {

    public function cart() {
        $orderId = session('orderId');
        if($orderId) {
            $order = Order::FindOrFail($orderId);
        }
        $order = $order ?? '';
        return view('cart', compact('order'));
    }

    public function cartAdd($productId) {
        $orderId = session('orderId');

        if(!$orderId) {
            $orderId = Order::create()->id;
            session(['orderId' => $orderId]);
        }

        $order = Order::find($orderId);

        if($order->products->contains($productId)) {
            $rowProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            $rowProduct->qty++;
            $rowProduct->update();
        } else
            $order->products()->attach($productId);

        return redirect()->route('cart');
    }

    public function cartRemove($productId) {
        $orderId = session('orderId');
        $order = Order::find($orderId);

        if($order->products->contains($productId)) {
            $rowProduct = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($rowProduct->qty > 1) {
                $rowProduct->qty--;
                $rowProduct->update();
            } elseif ($rowProduct->qty == 1)
                $order->products()->detach($productId);

        } else
            $order->products()->detach($productId);

        return redirect()->route('cart');
    }

    function checkout() {
        $orderId = session('orderId');

        if(!$orderId)
            return redirect()->route('index');

        $order = Order::find($orderId);
        return view('checkout', compact('order'));

    }

    public function checkoutConfirm(Request $request) {
        $orderId = session('orderId');

        if(!$orderId)
            return redirect()->route('index');

        $order = Order::find($orderId);
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->update();
        session()->forget('orderId');

        return redirect()->route('index');
    }

}
