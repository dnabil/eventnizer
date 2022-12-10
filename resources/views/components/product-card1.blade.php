<a class="card mb-5 text-reset text-decoration-none" style="width: 18rem;" href="{{ $link }}">
    <img src="{{ $photo }}" class="h-50 card-img-top" alt="product photo">
    <div class="card-body">
        {{-- Title --}}
        <div class="fw-550 fs-4">
            @php
                if (strlen($title) > 14) {
                    echo Str::substr($title, 0, 14) . '..';
                } else {
                    echo $title;
                }
            @endphp
        </div>

        {{-- description --}}
        <p class="card-text">
            @php
                if (strlen($description) > 99) {
                    echo Str::substr($description, 0, 99) . '..';
                } else {
                    echo $description;
                }
            @endphp
        </p>
    </div>
    {{-- price --}}
    <p>
        <center>
            @php
                echo sprintf('Rp %s <br />~ %s', number_format($minPrice, 0, ',', '.'), number_format($maxPrice, 0, ',', '.'));
            @endphp
        </center>
    </p>

    <div class="d-flex justify-content-around gap-1 p-3">
        <form action="/product-update" method="GET">
            @csrf
            <button type="submit" class="btn btn-pink text-nowrap" name="slug" value="{{ $slug }}">
                Edit
            </button>
        </form>
        <form action="/product-delete" method="POST">
            @csrf
            <button type="submit" class="btn btn-white text-nowrap" name="slug" value="{{ $slug }}">
                Hapus ❌
            </button>
        </form>
    </div>
</a>
