{{-- include import.bootstrap-css --}}
{{-- include import.root --}}
{{-- include import.bootstrap-js --}}
{{-- import google-icons --}}

<nav class="navbar navbar-expand-lg bg-cream">
    <div class="container d-flex justify-content-between align-items-center ">
        <div class="d-flex align-items-center">
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
                        <form class="d-flex" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                style="padding-top: 0; padding-bottom:0;">
                            <button class="btn text-dark bg-transparent m-0" type="submit">
                                <span class="material-symbols-outlined">
                                    search
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item px-1">
                        <a class="nav-link active" href="#">
                            <img src="/img/person.svg" alt="person icon">
                            <span>{{ auth()->user()->fname }}</span>
                        </a>
                    </li>
                    @if (auth()->user()->merchant != null)
                        <li class="nav-item px-1">
                            <a class="nav-link" href="/merchant-edit">
                                <span class="material-symbols-outlined fs-3">
                                    storefront
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item px-1">
                        <a class="nav-link" href="#">
                            <span class="material-symbols-outlined fs-3">
                                comment
                            </span>
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="#">
                            <span class="material-symbols-outlined fs-3">
                                notifications
                            </span>
                        </a>
                    </li>
                    <li class="nav-item px-1 d-flex align-items-center">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item nav-link">
                                <span class="material-symbols-outlined">
                                    logout
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
