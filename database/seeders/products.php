<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => Str::random(10),
            'vendor_code' => rand(10000, 99999),
            'description' => Str::random(100),
            'price' => rand(100, 3000)
        ]);
    }
}
