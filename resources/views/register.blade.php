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
    {{-- body {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url("merchant-registration-bg.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
} --}}

    <div class="d-flex flex-wrap align-items-center justify-content-between my-5 mx-5">
        <div class="col-lg-5 img-registrasi">
            <img src="/img/registrasi.png" alt="">
        </div>

        <div class="registrasi text-center col-xl-5 col-md-12">
            <h1>Register</h1>

            <form action="/register" method="POST">
                @csrf
                <div class="container center-form">
                    <div class="row center-form justify-content-center align-items-center">

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input @error('fname') is-invalid @enderror"
                                type="text" placeholder="First name" name="fname" required
                                value="{{ old('fname') }}" />
                        </div>
                        @error('fname')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input @error('lname') is-invalid @enderror"
                                type="text" placeholder="Last name" name="lname" required
                                value="{{ old('lname') }}" />
                        </div>
                        @error('lname')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror


                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('email') is-invalid @enderror"
                                type="email" id="Email Address" placeholder="Email" name="email" required
                                value="{{ old('email') }}" />
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group col-sm-10">
                            <input class="form-control transparent-input  @error('password') is-invalid @enderror"
                                type="password" id="Password" placeholder="Password" name="password" required />
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <input class="button button-pink" type="submit" value="Daftar" />
            </form>

            <div class="batalRegistrasi">
                <label>Have an account? </label><a href="/login">Login</a>
            </div>
        </div>
    </div>
@endsection
