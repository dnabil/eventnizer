@if ($title == '')
    $title = "Eventnizer - Realisasikan mimpimu!";
@endif

@extends('layout.main')

@section('container')
    {{-- CAROUSEL --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @forelse ($promos as $promo)
                <div class="carousel-item">
                    <a href="{{ $promo->link }}">
                        <img src="{{ $promo->photo }}" alt="promo"
                            style='height: 100%; width: 100%; object-fit: contain'>
                    </a>
                </div>
            @empty
                <div class="carousel-item active">
                    <a href="#">
                        <img src="/img/promo/default_promo.png" alt="promo"
                            style='height: 100%; width: 100%; object-fit: contain'>
                    </a>
                </div>
            @endforelse
            <div class="carousel-item">
                <a href="/register-merchant">
                    <img src="/img/promo/daftar_mitra_promo.png" alt="promo"
                        style='height: 100%; width: 100%; object-fit: contain'>
                </a>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- END OF CAROUSEL --}}


    {{-- card carousel dependencies --}}
    @include('import.swiper-css')
    @include('import.card-slider-css')

    {{-- card carousel --}}

    {{-- title --}}


    <div class="slide-container swiper my-5">
        <div class="px-5">
            <p class="fw-bold fs-2 mb-0">Yang lagi populer di daerahmu...</p>
            <p>dengan review paling top markotop</p>
        </div>

        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @forelse($productTops as $product)
                @empty
                    <div class="card swiper-slide">
                        <!-- <div class="image-content"> -->
                        <!-- <span class="overlay"></span> -->

                        <div class="card-image">
                            <img src="images/decor_1.jpg" alt="" class="card-img">
                        </div>
                        <!-- </div> -->

                        <div class="card-content">
                            <h2 class="name">Belum ada produk nih..</h2>
                            <p class="description"> :< </p>

                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>


    <div class="bg-cream">
        <div class="slide-container swiper my-5">
            <div class="px-5">
                <p class="fw-bold fs-2 mb-0">Katering yang sedang populer</p>
                <p>dengan review paling top markotop</p>
            </div>

            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    @forelse($caterings as $catering)
                    @empty
                        <div class="card swiper-slide">
                            <!-- <div class="image-content"> -->
                            <!-- <span class="overlay"></span> -->

                            <div class="card-image">
                                <img src="images/decor_1.jpg" alt="" class="card-img">
                            </div>
                            <!-- </div> -->

                            <div class="card-content">
                                <h2 class="name">Belum ada produk nih..</h2>
                                <p class="description"> :< </p>

                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <div class="slide-container swiper my-5">
        <div class="px-5">
            <p class="fw-bold fs-2 mb-0">Random</p>
            <p>Produk terpilih secara acak...</p>
        </div>

        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @forelse($randoms as $product)
                    <div class="card swiper-slide">
                        <!-- <div class="image-content"> -->
                        <!-- <span class="overlay"></span> -->

                        <div class="card-image">
                            <img src={{ $product->photo }} alt="" class="card-img">
                        </div>
                        <!-- </div> -->

                        <div class="card-content">
                            <h2 class="name">
                                @php
                                    $desc = $product->name;
                                    if (strlen($desc) < 20) {
                                        echo $desc;
                                    } else {
                                        echo Str::substr($desc, 0, 20) . '...';
                                    }
                                @endphp
                            </h2>
                            <p class="description">
                                @php
                                    $desc = $product->description;
                                    if (strlen($desc) < 40) {
                                        echo $desc;
                                    } else {
                                        echo Str::substr($desc, 0, 40) . '...';
                                    }
                                @endphp
                            </p>

                        </div>
                    </div>
                @empty
                    <div class="card swiper-slide">
                        <!-- <div class="image-content"> -->
                        <!-- <span class="overlay"></span> -->

                        <div class="card-image">
                            <img src="images/decor_1.jpg" alt="" class="card-img">
                        </div>
                        <!-- </div> -->

                        <div class="card-content">
                            <h2 class="name">Belum ada produk nih..</h2>
                            <p class="description"> :< </p>

                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>





    @include('import.swiper-js')
    @include('import.card-slider-js')
    {{-- end of card carousel --}}
@endsection
