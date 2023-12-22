@extends('layouts.main')
<style>
    .hero__heading {
        font-size: 36px;
        /* Ukuran teks */
        color: #333;
        /* Warna teks */
        text-align: center;
        /* Posisi teks tengah */
        animation: blink 1s infinite;
        /* Animasi berkedip */
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

</style>
@section('container')
    <center>
        <div class="hero__content h-75 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width">
                <div>
                    <h1 class="hero__heading fw-bold" style="font-size: 50px; color: #222831;">zax</h1>
                    <p class="lead fw-bold" style="color: #222831; font-size: bold">zax adalah toko yang
                        menjual produk-produk teknologi dan fashion yang stylish dan berkualitas. Toko ini menawarkan
                        berbagai macam produk, mulai dari pakaian, aksesoris, hingga perangkat elektronik. Semua produk di
                        toko ini dirancang dengan gaya yang modern dan kekinian, sehingga Anda dapat tampil gaya dan tetap
                        mengikuti perkembangan teknologi.</p>
                    <a href="/product" class="mt-2 btn btn-dark" role="button"><span></span>Go To Product</a>
                </div>
            </div>
        </div>
    </center>
@endsection
