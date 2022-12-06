@extends('layout.main')

@section('container')
    <style>
        .registrasi {
            max-width: fit-content;
            padding: 20px;
            border-radius: 12px;
            background: white;
            box-shadow: 2px 2px 25px 1px;
        }

        @media(max-width: 1400px) {
            .img-registrasi {
                display: none;
                width: 1px;
            }
        }

        .registrasi h1 {
            font-size: 30px;
            margin-bottom: 75px;
            margin-top: 25px;
            font-weight: bold;
        }

        .registrasi form {
            font-size: 20px;
        }

        .registrasi form .form-group {
            margin-bottom: 25px;
        }

        .transparent-input {
            background-color: rgba(0, 0, 0, 0) !important;
            border: none !important;
            border-bottom: 1px solid black !important;
            border-radius: 0px !important;
        }

        button,
        .button-pink {
            border-radius: 30px;
        }

        .button-pink {
            background-color: #f48879;
            color: white;
            border: 0px;
            padding: 0.8em 1.2em;
            font-weight: 525;
        }

        .batalRegistrasi {
            margin-top: 10px;
        }
    </style>

    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="registrasi text-center col-xl-5 col-md-12 ">
            <h1>Tambah Produk</h1>

            <form action="/product-add" method="POST">
                @csrf
                <div class="container center-form">
                    <div class="row center-form justify-content-center align-items-center">

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('name') is-invalid @enderror" type="text"
                                id="name" placeholder="Nama Produk" name="name" required
                                value="{{ old('name') }}" />
                        </div>
                        {{-- @error('')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('min_price') is-invalid @enderror"
                                type="number" id="min_price" placeholder="Harga minimal" name="min_price" required />
                        </div>
                        {{-- @error('')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('max_price') is-invalid @enderror"
                                type="number" id="max_price" placeholder="Harga maksimal" name="max_price" required />
                        </div>
                        {{-- @error('')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        <div class="form-group col-sm-10">
                            <textarea class="form-control  @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="3" placeholder="Deskripsi produk" name="description" id="description" value="{{ old('description') }}"
                                required></textarea>
                        </div>
                        {{-- @error('')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror --}}

                    </div>
                </div>

                <input class="button button-pink" type="submit" value="Tambah" />
            </form>

            <div class="batalRegistrasi">
                <label>Kembali? </label><a href="/merchant-edit">klik disini</a>
            </div>
        </div>
    </div>
@endsection
