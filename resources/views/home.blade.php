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

    {{-- card carousels --}}

    <div class="my-5">
        <x-card-carousel title="Random" subTitle="Produk yang terpilih secara acak..." :contents="$randoms" />
    </div>

    <div class="bg-cream my-5">
        <x-card-carousel title="Katering yang sedang populer" subTitle="dengan review paling top markotop"
            :contents="$caterings" />
    </div>

    <div class="my-5">
        <x-card-carousel title="Yang lagi populer di daerahmu..." subTitle="dengan review paling top markotop"
            :contents="$productTops" />
    </div>

    @include('import.swiper-js')
    @include('import.card-slider-js')
    {{-- end of card carousels --}}
@endsection
