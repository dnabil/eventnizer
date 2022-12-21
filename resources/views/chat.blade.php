@php
    if (!isset($title)) {
        $title = 'Chat | eventnizer';
    }
@endphp

@extends('layout.main')
{{-- @section('head')
@endsection --}}
@section('container')
    <div class="
    container d-flex 
    justify-content-md-between flex-wrap
    my-5
    ">
        {{-- section profil mitra --}}
        <section class="order-lg-0 order-1 col-lg-3 col-12">
            <div class="rounded-4 shadow col-lg-3 w-100 p-3 mb-3">
                <div class="d-flex gap-2 align-items-center">
                    <img src="{{ $merchant->photo }}" alt="foto merchant"
                        style="width:5em; height: 5em; object-fit:scale-down;" class="rounded-circle">
                    <div class="row">
                        <h2 class="fs-3">{{ $merchant->name }}</h2>
                        <p>
                            {{ Str::title(sprintf('%s, %s', $merchant->city->name, $merchant->province->name)) }}
                        </p>
                    </div>
                </div>

                <p>{Masukkan jenis usaha disini}</p>
                <p>
                    @php
                        $desc = $merchant->description;
                        if (strlen($merchant->description) > 200) {
                            $desc = Str::substr($desc, 0, 200) . '...';
                        }
                    @endphp
                    {{ $desc }}
                </p>

                {{-- kontak --}}
                <div>
                    Kontak:
                </div>
                <div class="d-flex align-items-center">
                    <span class="material-symbols-outlined">mail</span>
                    <span>{{ $merchant->user->email }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-white border-0 rounded-5 px-4 shadow">
                    <div class="d-flex align-items-center">
                        <span class="material-symbols-outlined">
                            local_mall
                        </span>
                        <span>
                            Profil mitra
                        </span>
                    </div>
                </button>
            </div>
        </section>

        {{-- chat --}}
        <section class="col-lg-8 col-12 py-2 px-4 rounded-5 shadow">
            <div class="text-center">
                <b class="fs-3">{{ $merchant->name }}</b>
                <p class="text-secondary">{status}</p>
            </div>

            <div class="overflow-scroll"
                style="
                    min-height: 60vh;
                    max-height: 60vh;">

                {{-- user's chat bubble --}}
                <div class="d-flex align-items-end mb-3 flex-column">
                    <p class="mb-0 px-3 text-secondary">
                        You
                    </p>
                    <div class="rounded-5 py-3 px-4"
                        style="
                    background-color: var(--blue);
                    max-width: 70%;
                    color:var(--white);
                ">
                        Halo!
                    </div>
                </div>

                {{-- merchant's chat bubble --}}
                <div class="d-flex align-items-start flex-column mb-3">
                    <p class="mb-0 px-2 text-secondary">
                        {{ $merchant->name }}
                    </p>
                    <div class="rounded-5 py-3 px-4"
                        style="
                    max-width: 70%;
                    background-color:#E9E9EB;
                ">
                        Hi
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <input
                    style="
                        min-width: 95%;
                        max-width: 95%;
                    "
                    type="text" class="form-control">
                </input>
                <button class="btn btn-white p-1 d-flex align-items-center text-dark border-0">
                    <span class="material-symbols-outlined">
                        send
                    </span>
                </button>
            </div>
        </section>


    </div>
@endsection
