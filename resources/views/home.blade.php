@extends('layout')

@section('title')
StokBarang.id | Home
@endsection

@section('content')

<div class="px-[2.2cm] py-[3cm]">
    <div class="grid grid-cols-2">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
                Kelola Stok Barang Anda dengan Mudah dan Efisien
            </h1>
            <h2 class="text-2xl md:text-3xl mb-4 text-gray-600">
                Solusi Pintar untuk Manajemen Stok yang Lebih Baik
            </h2>
            <p class="text-lg md:text-xl mb-8 text-gray-500">
                Apakah Anda kesulitan dalam mengelola stok barang? Dengan aplikasi kami, Anda dapat memantau, mengatur,
                dan mengoptimalkan inventaris Anda dengan cepat dan mudah. Dapatkan laporan real-time dan analisis
                untuk membuat keputusan yang lebih cerdas.
            </p>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('/storage/images/1311295_395.svg') }}" alt="" width="500px" height="500px">
        </div>

    </div>
</div>
@endsection