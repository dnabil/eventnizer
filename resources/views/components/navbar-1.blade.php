{{-- include import.bootstrap-css --}}
{{-- include import.root --}}
{{-- include import.bootstrap-js --}}

<style>
    .transparent-input {
        background-color: rgba(0, 0, 0, 0) !important;
        border: none !important;
        border-bottom: 1px solid black !important;
        border-radius: 0px !important;
    }

    .block-btn {
        display: block;
        width: 100%;
        border: none;
    }
</style>

<nav class="navbar navbar-expand-lg bg-cream">
    <div class="container d-flex justify-content-between ">
        <div>
            <a class="navbar-brand" href="/">
                <img class="navbar-img" src="/img/Logo Eventnizer.svg" alt="Eventnizer">
            </a>
        </div>

        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="menjadi-mitra" aria-current="page" href="/register-merchant">
                            Menjadi mitra
                        </a>
                    </li>
                    <li class="nav-item">
                        <button id="login" type="button" class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#loginModal" style="background-color:transparent;">
                            Login
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="register" onclick="location.href='./register'">Register</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="/login" method="POST">
                        @csrf

                        {{-- class="modal-title fw-bold fs-2 px-4 mb-5" id="loginModalLabel" --}}
                        <div class="row center-form justify-content-center align-items-center">
                            <h1 class="form-group mb-5 col-sm-10 modal-title fw-bold">
                                Login
                            </h1>
                            <div class="form-group mb-4 col-sm-10">
                                <input class="form-control transparent-input  @error('email') is-invalid @enderror"
                                    type="email" id="Email Address" placeholder="Email" name="email" required
                                    value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group mb-4 col-sm-10">
                                <input class="form-control transparent-input  @error('password') is-invalid @enderror"
                                    type="password" id="Password" placeholder="Password" name="password" required />
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group mt-5 mb-4 col-sm-10 d-flex justify-content-center">
                                <input class="btn btn-pink block-btn" type="submit" value="Continue" />
                            </div>

                            <div style="height: 0.8em;  border-bottom: 1px solid black; text-align: center"
                                class="form-group mb-4 col-sm-10 text-center mb-3">
                                <span style="background-color: white"> Don't have an account? <a
                                        href="/register">Register</a> </span>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</nav>
