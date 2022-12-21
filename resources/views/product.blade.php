@extends('layout.main')

@section('container')
    <div class="container mx-auto row my-5">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="col-xl-7">
                <div class="row ">
                    {{-- photo&TITLE --}}
                    <div class="d-flex gap-3 border-bottom ">
                        <img src="{{ $product->merchant->photo }}" alt="foto merchant"
                            style="width:100px; height: 100px; object-fit:scale-down;" class="rounded-circle">
                        <div class="row">
                            <h2 class="mb-1">{{ $product->name }}</h2>
                            <p class="mb-1">by-<a
                                    href="/merchant/{{ $product->merchant->slug }}"><b>{{ $product->merchant->name }}</b></a>
                            </p>
                            <p class="mb-1">Lokasi:
                                {{ Str::title(sprintf('%s, %s', $product->merchant->city->name, $product->merchant->province->name)) }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-5 justify-content-center">
                        <img class="rounded img-fluid p-5" src="{{ $product->photo }}" alt="">
                    </div>

                    <div class="p-3">
                        <h3>Deskripsi</h3>

                        <p id="deskripsi">
                            {!! nl2br($product->description) !!}
                        </p>
                    </div>
                </div>

            </div>

            <div class="offset-1 col-xl-4">
                {{-- <div class="row"></div> --}}
                {{-- harga --}}
                <div class="shadow p-5 mb-5 rounded ">
                    <p class="fs-3 fw-bold">
                        Harga
                    </p>
                    <p class="fs-22"> Rp {{ number_format($product->max_price, 2, ',', '.') }}</p>

                    <div class="d-flex flex-column ">
                        <button class="btn-white col-12 mb-3">Chat</button>
                        <button id="buyButton" type="button" class="btn col-12" data-bs-toggle="modal"
                            data-bs-target="#beliModal">
                            Beli
                        </button>
                    </div>
                </div>

                <div>
                    <p class="fw-bolder">Syarat dan Ketentuan*</p>
                    <p>arasoiatte koware kakatta
                        Kono ochame na hoshi de
                        Umareochita hi kara yosomono
                        Namida kare hateta
                        Kaeri yuku basho wa yume no naka

                        koboreochita saki de deatta
                        Tada himitsu wo kakae
                        Futsuu no furi wo shita anata to
                        Sagashi akirameta
                        Watashi no ibasho wa tsukuru mono datta</p>
                </div>


            </div>

        </div>

    </div>


    {{-- MODAL for BELI BUTTON --}}
    <div class="modal fade" id="beliModal" tabindex="-1" aria-labelledby="beliModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end p-2 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body pt-0">
                    <h1 class="modal-title fs-5 fw-bolder text-center mb-3" id="exampleModalLabel">Pesan Sekarang</h1>
                    <form action="/oh-buy" method="POST" class="d-flex gap-3 flex-column align-items-center">
                        @csrf
                        <input type="hidden" name="slug" class="invisible" value="{{ $product->slug }}">
                        <h2 class="btn btn-pink">{{ $product->name }}</h2>
                        <p>Mohon lengkapi tanggal layanan anda</p>
                        <div class="text-center">
                            <label for="eventDate">Tanggal Layanan</label><br>
                            <input type="datetime-local" class="form-control" name="eventDate" id="eventDate">
                            @error('eventDate')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="m-4">
                            <button type="submit" class="btn">Bayar Lunas - IDR
                                {{ number_format($product->max_price, 0, ',', '.') }} </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        var errorData = document.getElementsByClassName("invalid-feedback");
        console.log(errorData);
        if (errorData.length > 0) {
            document.getElementById("buyButton").click();
        }
    </script>
    {{-- endof MODAL for BELI BUTTON --}}
@endsection
