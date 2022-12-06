{{-- include import.bootstrap-css --}}
{{-- include import.root --}}
{{-- include import.bootstrap-js --}}

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
                        <a class="nav-link active" id="menjadi-mitra" aria-current="page" href="#">Menjadi
                            mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="login" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="register" onclick="location.href='./register'">Register</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
