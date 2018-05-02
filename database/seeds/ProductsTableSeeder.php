<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $p1 =Product::create([
            'name' => 'Samsung',
            'price' => 499,
            'image' => 'uploads/products/galaxy.jpg',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $p2 =Product::create([
            'name' => 'Iphone X',
            'price' => 999,
            'image' => 'uploads/products/iphone_x.jpg',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $p3 =Product::create([
            'name' => 'Mac',
            'price' => 1999,
            'image' => 'uploads/products/mac.jpg',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $p4 =Product::create([
            'name' => 'Mate Book',
            'price' => 799,
            'image' => 'uploads/products/mate.jpg',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $p5 =Product::create([
            'name' => 'Razer Phone',
            'price' => 299,
            'image' => 'uploads/products/razer.jpg',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        
        
    }
}
