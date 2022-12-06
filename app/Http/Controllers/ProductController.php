<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ProductController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product', [
            'title' => 'nama produk | eventnizer'
        ]);
    }

    /**
     * 
     * view
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'title' => 'tambah produk | eventnizer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchant = auth()->user()->merchant;
        if ($merchant == null) {
            return view('home');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|min:50',
            'min_price' => 'numeric|required',
            'max_price' => 'numeric|required'
        ]);
        $validatedData += ['merchant_id' => $merchant->id];
        $validatedData += ['slug' => unique_random('products', 'slug', 15)];
        Product::create($validatedData);
        return redirect('/product-add')->with('success', 'produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $prods =  auth()->user()->merchant->product;
        foreach ($prods as $key => $value) {
            if ($request->slug == $value->slug) {
                $value->delete();
                return redirect('/merchant-edit')->with('success', 'produk berhasil dihapus');
            }
        }
    }
}
