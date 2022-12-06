@extends('layout.main')

@section('container')
    <div class="container mx-auto row my-5">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="col-xl-7">
                <div class="row ">
                    {{-- photo&TITLE --}}
                    <div class="d-flex gap-3 border-bottom ">
                        <img src="/img/merchant/default.jpg" alt="foto merchant"
                            style="width:100px; height: 100px; object-fit:scale-down;" class="rounded-circle">
                        <div class="row">
                            <h2 class="mb-1">Judul Produk</h2>
                            <p class="mb-1">by-<b>nama toko</b>(TITLE)</p>
                            <p class="mb-1">Lokasi: Kota, Provinsi</p>
                        </div>
                    </div>

                    <div class="d-flex gap-5 justify-content-center">
                        <img class="rounded img-fluid p-5" src="/img/product/default.jpg" alt="">
                    </div>

                    <div class="p-3">
                        <h3>Deskripsi</h3>

                        <p id="deskripsi">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae quisquam, natus inventore
                            facilis,
                            exercitationem laudantium dolorem quam, voluptatibus illum est amet asperiores sed animi dolorum
                            quibusdam iusto eligendi libero modi pariatur vel hic iure earum adipisci. Autem labore quae
                            incidunt
                            dolore culpa dignissimos fugiat nostrum, voluptas cumque adipisci illum architecto deleniti
                            blanditiis
                            aspernatur expedita obcaecati ut, cupiditate, consequuntur sint accusamus ipsum. Aliquam libero,
                            quia ab
                            ad soluta, dicta consequuntur provident aperiam, in maiores sint dignissimos ipsum quaerat
                            laudantium
                            ratione sapiente laborum porro. Cupiditate ad amet molestiae suscipit corporis quas doloremque
                            error
                            quibusdam odit voluptate, non obcaecati dicta! Adipisci quae itaque dolorum omnis dolor debitis
                            dolorem
                            officiis ex voluptatem, nesciunt sunt facilis corporis doloremque quidem quos, dolore, eligendi
                            quod
                            obcaecati qui ratione saepe cupiditate fugit repellendus! Doloribus officia modi tempore
                            perferendis
                            dolores debitis odio adipisci hic, praesentium commodi fugit necessitatibus deserunt blanditiis
                            aperiam
                            fugiat similique ea pariatur a nisi exercitationem ducimus quaerat minus. Ratione tempore dolor
                            sapiente
                            est, doloribus nobis ipsum itaque, eos odit unde obcaecati voluptas iusto accusamus cupiditate
                            dolorem
                            assumenda autem ipsa tenetur? Fugiat ipsum nihil adipisci suscipit nostrum voluptates tempore
                            accusantium repellat facilis molestias aperiam iste molestiae quibusdam delectus laborum
                            commodi,
                            voluptas labore. Temporibus repellendus hic veniam facilis?
                        </p>
                    </div>


                </div>

            </div>

            <div class="offset-1 col-xl-4">
                {{-- <div class="row"></div> --}}
                {{-- harga --}}
                <div class="shadow p-5 mb-5 rounded ">
                    <p class="fs-3 fw-bold">
                        Harga
                    </p>
                    <p class="fs-22"> IDR - hrgproduk,-</p>

                    <div class="d-flex flex-column ">
                        <button class="btn-white col-12 mb-3">Chat</button>
                        <button class="btn col-12">Beli</button>
                    </div>
                </div>

                <div>
                    <p class="fw-bolder">Syarat dan Ketentuan*</p>
                    <p>arasoiatte koware kakatta
                        Kono ochame na hoshi de
                        Umareochita hi kara yosomono
                        Namida kare hateta
                        Kaeri yuku basho wa yume no naka

                        koboreochita saki de deatta
                        Tada himitsu wo kakae
                        Futsuu no furi wo shita anata to
                        Sagashi akirameta
                        Watashi no ibasho wa tsukuru mono datta</p>
                </div>


            </div>

        </div>

    </div>
@endsection
