<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Symfony\Component\VarDumper\VarDumper;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\Support\ValidatedData;

class ProductController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $product = Product::with(['merchant', 'merchant.province', 'merchant.city', 'merchant.district'])->where('slug', $slug)->first();

        return view('product', [
            'title' => 'nama produk | eventnizer',
            'product' => $product
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
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|min:50',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric'
        ]);

        $p = Product::where('slug', $request->slug)->first()->update($validatedData);

        return redirect('/merchant-edit')->with('success', 'produk berhasil diedit');
    }
    public function updateView(Request $request)
    {
        $slug = $request->slug;

        $product = Product::with('merchant')->where('slug', $slug)->first();
        $merchantFromSlug = $product->merchant;
        $merchantfromAuth = auth()->user()->merchant;

        if ($merchantfromAuth->id != $merchantFromSlug->id) {
            return redirect('/merchant-edit')->with('error', 'unauthorized');
        }

        return view('product.update', [
            'title' => 'update produk | eventnizer',
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
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
