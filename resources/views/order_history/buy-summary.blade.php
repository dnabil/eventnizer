@php
    if (!isset($title)) {
        $title = 'Buy Summary | eventnizer';
    }
@endphp

@extends('layout.main')

@section('container')
    <div class="container my-5">
        <h1 class="my-5 text-secondary text-center fw-bold fs-2">
            Rangkuman Pembayaran
        </h1>
        <form action="oh-buy-summary" method="POST">
            @csrf
            <div class="d-flex flex-column">
                <div class="mx-auto border border-1 shadow py-4 px-5 bg-body rounded" style="width: 90%">
                    <div class="row fw-bold">
                        <p class="col-6">Detail Pesanan</p>
                        <p class="col-6 text-end">-</p>
                    </div>
                    <div class="row border-bottom border-1 mb-4">
                        <div class="d-flex justify-content-between">
                            <p class="col-6">{{ $product->merchant->name }}-<b>{{ $product->name }}</b></p>
                            <p class="col-6 text-end">Rp {{ number_format($product->max_price, 0, ',', '.') }}</p>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="col-6">Tanggal event/layanan</p>
                            <input class="col-6 form-control" type="datetime-local" style="width:fit-content;"
                                value="{{ $eventDate }}" title="To change the date, go back to the product page."
                                disabled />
                            {{-- @error('eventDate')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>

                        {{-- FORM DATA --}}
                        <input class="col-6 form-control invisible" type="datetime-local hidden" name="eventDate"
                            id="eventDate" style="width:fit-content;" value="{{ $eventDate }}" />
                        <input type="hidden" name="slug" class="invisible" value="{{ $product->slug }}">

                    </div>
                    <div class="row fw-bold">
                        <p class="col-6">Kode Promo</p>
                    </div>
                    <div class="row border-bottom border-1 mb-4">
                        <div class="col-7 d-flex align-items-center">
                            <p>Gunakan Kode Promo</p>
                        </div>
                        <div class="col-5 d-flex gap-2 mb-4">
                            <input type="text" class="form-control" id="promo"
                                placeholder="Masukkan Kode-fitur belum tersedia" disabled />
                            <button type="button" class="px-4 btn fw-bold" disabled>
                                Gunakan
                            </button>
                        </div>
                    </div>
                    <div class="row border-bottom border-1 my-4">
                        <p class="col-6 fw-bold">Subtotal</p>
                        <p class="col-6 text-end">Rp {{ number_format($product->max_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="row">
                        <p class="col-6 fw-bold">Total Pembayaran</p>
                        <p class="col-6 text-end">Rp {{ number_format($product->max_price, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="my-4 ms-auto px-5 me-xxl-3 me-md-2">
                    <button type="button" class="px-4 btn btn-danger fw-bold" data-bs-toggle="modal"
                        data-bs-target="#modalPembayaran">
                        Lakukan Pembayaran
                    </button>
                </div>
            </div>


            {{-- SUBMIT FORM BUTTON ADA DI SINI --}}
            {{-- MODAL PEMILIHAN BANK --}}
            <!-- Modal -->
            <div class="modal fade" id="modalPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="modalPembayaranLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="modalPembayaranLabel">
                                Pilih Bank
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <select class="form-select my-1" aria-label="Default select">
                                <option selected value="1">Bank BCA</option>
                                <option value="2">Bank Mandiri</option>
                                <option value="3">Bank BRI</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="selesaikan.php" class="text-decoration-none">
                                <button type="submit" class="px-4 btn btn-danger fw-bold" data-bs-dismiss="modal">
                                    Lakukan Pembayaran
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
