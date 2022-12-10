@extends('layout.main')

@section('container')
    <div class="container mx-auto d-flex flex-wrap my-5 px-1">
        <div class="d-flex justify-content-center gap-5 col-12">

            <a class="btn btn-pink d-block " href="/product-add">Tambah Produk</a>
            <button class="btn btn-pink d-block">Edit profil mitra</button>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-5 my-5">
            @forelse ($merchant->product as $product)
                <x-product-card1 title="{{ $product->name }}" description="{{ $product->description }}"
                    photo="{{ $product->photo }}" minPrice="{{ $product->min_price }}" maxPrice="{{ $product->max_price }}"
                    link="{{ sprintf('/product/%s', $product->slug) }}" slug="{{ $product->slug }}" />
                {{-- end of cards --}}
            @empty
                <div>
                    <h3>Belum ada produk :( </h3>
                    <p>Silahkan menekan tombol "tambah produk" untuk menambahkan produk toko anda.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
