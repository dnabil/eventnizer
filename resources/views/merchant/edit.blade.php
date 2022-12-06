@extends('layout.main')

@section('container')
    <div class="container mx-auto d-flex flex-wrap my-5 px-1">
        <div class="d-flex justify-content-center gap-5 col-12">

            <a class="btn btn-pink d-block" href="/product-add">Tambah Produk</a>
            <button class="btn-pink d-block">Edit profil mitra</button>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-5 my-5">

            @foreach ($merchant as $m)
                @foreach ($m->product as $p)
                    {{-- cards --}}
                    <div class="card mb-5" style="width: 18rem;">
                        <img src="{{ $p->photo }}" class="card-img-top" alt="{{ $p->name }}">
                        <div class="card-body">
                            <p class="fw-bold">
                                @php
                                    $desc = $p->name;
                                    if (strlen($desc) < 20) {
                                        echo $desc;
                                    } else {
                                        echo Str::substr($desc, 0, 20) . '...';
                                    }
                                @endphp
                            </p>
                            <p class="card-text">
                                @php
                                    $desc = $p->description;
                                    if (strlen($desc) < 90) {
                                        echo $desc;
                                    } else {
                                        echo Str::substr($desc, 0, 91) . '...';
                                    }
                                @endphp
                            </p>
                        </div>
                        {{-- button wrapper --}}
                        <div class="d-flex justify-content-around gap-1 p-3">
                            <button class="btn text-nowrap">
                                Edit
                            </button>
                            <form action="/product-delete" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-white text-nowrap" name="slug"
                                    value="{{ $p->slug }}">
                                    Hapus ❌
                                </button>
                            </form>
                        </div>
                    </div>
                    {{-- end of cards --}}
                @endforeach
            @endforeach


        </div>
    </div>
@endsection
