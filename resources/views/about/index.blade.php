@extends('layout')

@section('title')
StokBarang.id | About
@endsection

@section('content')
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-8">
            Tentang Kami
        </h1>
        <p class="text-lg md:text-xl text-center text-gray-600 mb-12">
            Kami adalah tim yang berdedikasi untuk menyediakan solusi manajemen stok yang inovatif
            dan efisien untuk bisnis Anda. Dengan pengalaman bertahun-tahun dalam industri ini,
            kami memahami tantangan yang dihadapi oleh pemilik usaha dan siap membantu Anda
            mengelola inventaris dengan lebih baik.
        </p>

        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">
            Misi Kami
        </h2>
        <p class="text-lg md:text-xl text-gray-600 mb-8">
            Misi kami adalah memberikan kemudahan dan efisiensi dalam pengelolaan stok barang
            agar setiap pemilik usaha dapat fokus pada pertumbuhan bisnis mereka.
        </p>

        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">
            Visi Kami
        </h2>
        <p class="text-lg md:text-xl text-gray-600 mb-8">
            Visi kami adalah menjadi platform manajemen stok terdepan yang membantu bisnis
            di seluruh dunia untuk mengoptimalkan proses operasional mereka melalui teknologi
            yang canggih.
        </p>

        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">
            Tim Kami
        </h2>
        <p class="text-lg md:text-xl text-gray-600 mb-8">
            Kami terdiri dari profesional berpengalaman di bidang teknologi dan manajemen
            yang siap memberikan dukungan terbaik untuk pengguna kami. Kami percaya bahwa
            kolaborasi dan inovasi adalah kunci untuk menciptakan produk yang berkualitas.
        </p>

        <div class="text-center">
            <a href="/contact" class="btn btn-primary text-xl">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection