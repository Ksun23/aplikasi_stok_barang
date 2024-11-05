@extends('layout')

@section('title')
StokBarang.id | Contact
@endsection

@section('content')
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-8">
            Hubungi Kami
        </h1>
        <p class="text-lg md:text-xl text-center text-gray-600 mb-12">
            Kami ingin mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau ingin berdiskusi lebih lanjut,
            silakan isi formulir di bawah ini.
        </p>

        <div class="flex flex-col md:flex-row md:justify-between">
            <div class="md:w-1/3 mb-8 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">Informasi Kontak</h2>
                <p class="text-lg text-gray-600 mb-2">
                    <strong>Email:</strong> support@stokbarang.com
                </p>
                <p class="text-lg text-gray-600 mb-2">
                    <strong>Telepon:</strong> +62 123 456 7890
                </p>
                <p class="text-lg text-gray-600 mb-2">
                    <strong>Alamat:</strong> Jl. Contoh No. 123, Kota Contoh, Indonesia
                </p>
            </div>

            <div class="md:w-2/3">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-4">Kirim Pesan</h2>
                <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 mb-2">Nama:</label>
                        <input type="text" id="name" name="name" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email:</label>
                        <input type="email" id="email" name="email" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 mb-2">Pesan:</label>
                        <textarea id="message" name="message" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" rows="4"></textarea>
                    </div>
                    <button type="submit" class="w-full btn btn-primary text-xl">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection