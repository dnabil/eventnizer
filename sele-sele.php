<?php

use App\Models\Product;

$merchant = new Merchant;
$merchant->create([
    'name' => 'toko pertama'
]);

$produk = new Product;
$produk->create([
    'name' => 'produk1',
    'min_price' => 2000000,
    'max_price' => 3000000,
    'description' => 'desc produk1',
    'merchant_id' => 1,
]);

$promo1 = new Promo;
$promo1->photo = "./img/promo/promo-1.png"
$promo1->save()

$promo2 = new Promo;
$promo2->photo = "./img/promo/promo-2.png"
$promo2->save()

$promo3 = new Promo;
$promo3->photo = "./img/promo/promo-3.png"
$promo3->save()




