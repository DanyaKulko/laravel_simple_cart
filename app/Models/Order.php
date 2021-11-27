<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('qty')->withTimestamps();
    }

    public function getTotalPrice() {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceByCount();
        }

        return $sum;
    }
}

