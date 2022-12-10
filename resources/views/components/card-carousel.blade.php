<div class="slide-container swiper my-5">
    <div class="px-5">
        <p class="fw-bold fs-2 mb-0">{{ $title }}</p>
        <p>{{ $subTitle }}</p>
    </div>

    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

            @forelse($contents as $product)
                @php
                    $link = sprintf('/product/%s', $product->slug);
                @endphp
                <a class="card swiper-slide text-reset text-decoration-none" href="{{ $link }}">
                    <!-- <div class="image-content"> -->
                    <!-- <span class="overlay"></span> -->
                    @php
                        $contentLink = sprintf('product/%s', $product->slug);
                    @endphp
                    <div class="card-image">
                        <img src={{ $product->photo }} alt="" class="card-img"
                            style="
                            flex-shrink: 0;
                            min-width: 100%;
                            min-height: 100%">
                    </div>
                    <!-- </div> -->
                    <div class="card-content">
                        <h2 class="name">
                            @php
                                $desc = $product->name;
                                if (strlen($desc) < 20) {
                                    echo $desc;
                                } else {
                                    echo Str::substr($desc, 0, 20) . '...';
                                }
                            @endphp
                        </h2>
                        <p class="description">
                            @php
                                $desc = $product->description;
                                if (strlen($desc) < 40) {
                                    echo $desc;
                                } else {
                                    echo Str::substr($desc, 0, 40) . '...';
                                }
                            @endphp
                        </p>
                    </div>
                </a>
            @empty
                <div class="card swiper-slide">
                    <!-- <div class="image-content"> -->
                    <!-- <span class="overlay"></span> -->

                    <div class="card-image">
                        <img src="images/decor_1.jpg" alt="" class="card-img">
                    </div>
                    <!-- </div> -->

                    <div class="card-content">
                        <h2 class="name">Belum ada produk nih..</h2>
                        <p class="description"> :< </p>

                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
