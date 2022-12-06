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
            font-weight: bold;
        }

        .batalRegistrasi {
            margin-top: 10px;
        }
    </style>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="registrasi text-center col-xl-5 col-md-12 ">
            <h1>Registrasi Mitra</h1>

            <form action="/register-merchant" method="POST">
                @csrf
                <div class="container center-form">
                    <div class="row center-form justify-content-center align-items-center">

                        {{-- NAMA TOKO --}}
                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('name') is-invalid @enderror"
                                type="text" placeholder="Nama toko" name="name" id="name" required
                                value="{{ old('name') }}" />
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block mt-0">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- DESKRIPSI TOKO --}}
                        <div class="form-group col-sm-10">
                            <textarea class="form-control  @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="3" placeholder="Deskripsi Toko" name="description" id="description" value="{{ old('description') }}"
                                required></textarea>
                        </div>
                        @error('description')
                            <div class="invalid-feedback d-block mt-0">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- PROVINSI --}}
                        <div class="form-group col-sm-10">
                            <label class="text-start" for="provinsi">Provinsi</label>
                            <select class="form-select" name="provinsi" id="provinsi" aria-label="Default select example"
                                required>
                                <option>==Pilih Salah Satu==</option>
                                @forelse($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @empty
                                    <option>hubungi administrator</option>
                                @endforelse
                            </select>
                        </div>
                        {{-- @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror --}}

                        {{-- KOTA --}}
                        <div class="form-group col-sm-10">
                            <label class="text-start" for="kota">Kota</label>
                            <select class="form-select" name="kota" id="kota" aria-label="Default select example"
                                required>
                                <option>==Pilih Salah Satu==</option>
                            </select>
                        </div>

                        {{-- KECAMATAN --}}
                        <div class="form-group col-sm-10">
                            <label class="text-start" for="kecamatan">Kecamatan</label>
                            <select class="form-select" name="kecamatan" id="kecamatan" aria-label="Default select example"
                                required>
                                <option>==Pilih Salah Satu==</option>
                            </select>
                        </div>




                    </div>
                </div>

                <input class="button button-pink" type="submit" value="Masuk" />
            </form>

            <div class="batalRegistrasi">
                <label>Don't have an account? </label><a href="/register">Register</a>
            </div>
        </div>
    </div>

    @include('import.jquery')
    <script>
        function onChangeSelect(url, id, name) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('/cities') }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function() {
                onChangeSelect('{{ route('/districts') }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('/villages') }}', $(this).val(), 'desa');
            })
        });
    </script>
@endsection
