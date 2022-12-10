@extends('layout.main')

@section('container')
    @php
        $merchant = $merchant->first();
    @endphp

    <style>
        #product-heading {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        @media only screen and (max-width: 600px) {

            #product-wrapper {
                justify-content: center !important;
            }
        }

        @media only screen and (max-width: 1200px) {

            #product-wrapper {
                justify-content: space-around !important;
            }

            #product-heading {
                text-align: center;
            }
        }
    </style>
    <div class="container my-5 d-flex justify-content-around">
        <div class="row">
            <div style="min-height:fit-content;" class="col-xl-3 container shadow p-3 mb-5 rounded">
                {{-- header toko --}}
                <div class="d-flex flex-wrap ">
                    <div class="container fit-content col-2">
                        <img src="{{ $merchant->photo }}" class="rounded-circle mb-3" alt="nature image" width="50"
                            height="50">
                    </div>
                    <div class="container col-10">
                        <h3>{{ $merchant->name }}</h3>
                        <p>{{ sprintf('%s, %s', Str::title($merchant->province->name), Str::title($merchant->city->name)) }}
                        </p>
                    </div>
                </div>

                {{-- teks --}}
                <p class="my-4">
                    {{ $merchant->description }}
                </p>
                <p class="fw-bold">Kontak </p>
                <div>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-inbox" viewBox="0 0 16 16">
                            <path
                                d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                        </svg>
                    </span>

                    <span>{{ $merchant->user->email }}
                    </span>
                </div>
            </div>
            <!-- Container kanan-->
            <div class="offset-xl-1 col-xl-8">
                <div class="row">
                    <div class="container p-3 mb-5 bg-body rounded">
                        <div class="d-flex align-items-center justify-content-around">
                            <button class="btn text-nowrap">Toko</button>
                            <button class="btn text-nowrap">Review</button>
                            <button class="btn text-nowrap">Tentang Kami</button>

                        </div>
                        <br>
                        <h2 id="product-heading">Semua Produk</h2>
                        <div id="product-wrapper" class="row justify-content-evenly">
                            @foreach ($merchant->product as $product)
                                <x-product-card title="{{ $product->name }}" description="{{ $product->description }}"
                                    photo="{{ $product->photo }}" minPrice="{{ $product->min_price }}"
                                    maxPrice="{{ $product->max_price }}"
                                    link="{{ sprintf('/product/%s', $product->slug) }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
