@php
    if (!isset($title)) {
        $title = 'History | eventnizer';
    }
@endphp

@extends('layout.main')
@section('head')
    <style>
        .card-width {
            width: 18rem;
        }
    </style>

    <style>
        :root {
            --star-size: 30px;
        }

        .star-rating {
            font-size: 0;
            white-space: nowrap;
            display: inline-block;
            height: var(--star-size);
            overflow: hidden;
            position: relative;
            background: url("/img/star.svg");
            background-size: contain;
        }

        .star-rating i {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 1;
            background: url("/img/star-active.svg");
            background-size: contain;
        }

        .star-rating input {
            -moz-appearance: none;
            -webkit-appearance: none;
            opacity: 0;
            display: inline-block;
            /* width: 20%; remove this */
            height: 100%;
            margin: 0;
            padding: 0;
            z-index: 2;
            position: relative;
        }

        .star-rating input:hover+i,
        .star-rating input:checked+i {
            opacity: 1;
        }

        .star-rating i~i {
            width: 40%;
        }

        .star-rating i~i~i {
            width: 60%;
        }

        .star-rating i~i~i~i {
            width: 80%;
        }

        .star-rating i~i~i~i~i {
            width: 100%;
        }

        ::after,
        ::before {
            height: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
            vertical-align: middle;
        }

        .star-rating.star-5 {
            width: calc(var(--star-size) * 5);
        }

        .star-rating.star-5 input,
        .star-rating.star-5 i {
            width: 20%;
        }

        .star-rating.star-5 i~i {
            width: 40%;
        }

        .star-rating.star-5 i~i~i {
            width: 60%;
        }

        .star-rating.star-5 i~i~i~i {
            width: 80%;
        }

        .star-rating.star-5 i~i~i~i~i {
            width: 100%;
        }
    </style>
    @include('import.jquery')
@endsection
@section('container')
    <section class="container py-5 min-vh-100 d-flex justify-content-start gap-5 align-items-center flex-wrap">
        @forelse ($orderHistories as $orderHistory)
            @php
                $product = $orderHistory->product;
            @endphp
            <div class="d-flex flex-column">
                <x-product-card title="{{ $product->name }}" description="{{ $product->description }}"
                    photo="{{ $product->photo }}" minPrice="{{ $product->min_price }}" maxPrice="{{ $product->max_price }}"
                    link="{{ sprintf('/product/%s', $product->slug) }}" />
                <p class="card-width" style="margin-top: -2rem;">
                    @php
                        $isDone = $orderHistory->is_done;
                        $isPaid = $orderHistory->is_paid;
                        $status;
                        
                        // status-es
                        $reviewReady = 'Pesanan telah selesai';
                        $isNotPaid = 'Pesanan belum dibayar';
                        $inProggress = 'Pesanan sedang berlangsung';
                        $canceled = 'Pesanan dibatalkan';
                        
                        // isDone = ['true' || 'false' || 'canceled']
                        if ($isDone == 'true' && $isPaid != null) {
                            $status = $reviewReady;
                        } elseif ($isPaid == null) {
                            $status = $isNotPaid;
                        } elseif ($isPaid != null && $isDone == 'false') {
                            $status = $inProggress;
                        } elseif ($isDone == 'canceled') {
                            $status = $canceled;
                        }
                    @endphp
                    Status : {{ $status }}
                </p>
                @php
                    $buttonLink;
                    $buttonText;
                    
                    if ($status == $reviewReady) {
                        $buttonLink = "onclick=location.href='#;'";
                        $buttonText = "<span class=\"material-symbols-outlined\">edit_square</span> Beri ulasan";
                    } elseif ($status == $inProggress) {
                        $buttonLink = "onclick=location.href='#;'";
                        $buttonText = "<span class=\"material-symbols-outlined\">sms</span> Chat penjual";
                    } elseif ($status == $canceled) {
                        $buttonLink = "onclick=location.href='/product/$product->slug;'";
                        $buttonText = "<span class=\"material-symbols-outlined\">visibility</span> Lihat produk";
                    } /*($status == $isNotPaid)*/ else {
                        $buttonLink = "onclick=location.href='/oh-buy-payment/$orderHistory->slug'";
                        $buttonText = "<span class=\"material-symbols-outlined\">payments</span> Bayar";
                    }
                @endphp

                @if ($status == $reviewReady)
                    <button id="btnModal{{ $orderHistory->slug }}" type="button"
                        class="btn btn-white shadow rounded-5 border-0" data-bs-toggle="modal"
                        data-bs-target="#reviewModal{{ $orderHistory->slug }}">
                        {!! $buttonText !!}
                    </button>

                    <!-- review Modal -->
                    <div class="modal fade" id="reviewModal{{ $orderHistory->slug }}" tabindex="-1"
                        aria-labelledby="reviewModal{{ $orderHistory->slug }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="/review" method="POST">
                                        @csrf
                                        <div class="row center-form justify-content-center align-items-center px-5">
                                            <div class="modal-title form-group text-center">
                                                <b class="fs-4">
                                                    FORM REVIEW PRODUK
                                                </b>
                                                <p class="text-secondary mt-3">
                                                    Bagaimana pelayanan yang disediakan mitra?
                                                </p>
                                            </div>

                                            <p class="text-center">
                                                <b>
                                                    Rating
                                                </b>
                                            </p>
                                            <span class="star-rating star-5 p-0">
                                                <input type="radio" name="rating" value="1" /><i></i>
                                                <input type="radio" name="rating" value="2" /><i></i>
                                                <input type="radio" name="rating" value="3" /><i></i>
                                                <input type="radio" name="rating" value="4" /><i></i>
                                                <input type="radio" name="rating" value="5" /><i></i>

                                            </span>
                                            <input type="hidden" name="slug" value={{ $orderHistory->slug }} />
                                            <textarea name="description" rows="3" class="form-control mt-4" placeholder="Isi review">{{ old('description') }}</textarea>
                                            @error('rating')
                                                <div class="invalid-feedback d-block">
                                                    {{ 'Error: ' . $message }}
                                                </div>
                                            @enderror
                                            @error('description')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            @if ($errors->has('description') || $errors->has('rating'))
                                                <script>
                                                    document.getElementById({!! json_encode(strval('btnModal' . $orderHistory->slug)) !!}).click();
                                                </script>
                                            @endif

                                            <div class="form-group mt-5 mb-4 col-sm-10 d-flex justify-content-center">
                                                <input class="btn btn-pink block-btn" type="submit" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <button class="btn btn-white shadow rounded-5 border-0 card-width"
                        {{ $buttonLink }}>{!! $buttonText !!}</button>
                @endif
            </div>


        @empty
            <div class="d-flex flex-column">
                <h2> Belum ada produk yang kamu pesan nih.. </h2>
                <a href="/">Kembali ke halaman home</a>
            </div>
        @endforelse
    </section>
@endsection
