@php
    if (!isset($title)) {
        $title = 'Payment detail | eventnizer';
    }
@endphp
@extends('layout.main')

@section('head')
    @include('import.jquery')
    <script type="text/javascript" src="/js/jquery.countdown.min.js"></script>
@endsection
@section('container')
    <section class="container my-5 ">
        <div class="d-flex flex-column align-items-center gap-1 my-4">
            <h1 class="fs-3">Selesaikan pembayaran dalam</h1>

            {{-- WAKTU PEMBAYARAN: --}}
            @php
                $fullDate = \Carbon\Carbon::parse($orderHistory->created_at)->addDays(1); //addDays -> 1 hari setelah inisiasi
                $dayDate = $fullDate->format('l, d/m/Y');
                $countdown = $fullDate->format('Y/m/d h:m:i A e');
            @endphp
            <span id="test" class="clock fs-4 fw-bolder" data-countdown="{{ $countdown }}"
                style="color:var(--blue);"></span>
            <h3 class="text-secondary fs-6 fw-normal">Batas Akhir Pembayaran</h3>
            <h2 class="fs-4">
                {{ $dayDate }}
            </h2>
        </div>
        <div class="mx-auto border border-1 shadow py-4 px-5 bg-body rounded main-box">
            <p class="fw-bold border-bottom py-3">{Nama Metode Pembayaran}</p>
            <p class="text-secondary">{Kode/rekening pembayaran}</p>
        </div>
    </section>



    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            finalDate = new Date(finalDate).toLocaleString();
            console.log(finalDate);
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D hari %H:%M:%S'));
            });
        });
    </script>
@endsection
