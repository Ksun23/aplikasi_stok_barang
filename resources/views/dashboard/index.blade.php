@extends('layout')

@section('title')
StokBarang.id | Dashboard
@endsection

@section('content')
<div class="w-[100%] h-screen">
    <div class="grid grid-cols-4 grid-rows-1 mt-[1cm]">
        <div class="px-[3cm] col-span-1">
            <x-menu-component />
        </div>
        <div class="col-span-3 py-[1.9cm]">
            <div class="flex justify-between pr-[1.5cm]">
                <h1 class="text-4xl font-bold text-center">Data Barang</h1>
                <a class="btn btn-primary" onclick="my_modal_1.showModal()">+ Tambah</a>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <h1 class="font-bold text-3xl">Tambahkan Barang</h1>
                        <form class="my-[1cm] flex flex-col gap-5" action="{{ route('tambahbarang') }}">
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Nama barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="input input-bordered max-w-xs">
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">harga barang</label>
                                <input type="text" name="harga" id="nama_barang" class="input input-bordered max-w-xs">
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Deskripsi Barang</label>
                                <textarea class="textarea textarea-bordered w-[69%]" name="deskripsi" placeholder="Bio"></textarea>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Jumlah Barang</label>
                                <input type="number" name="stok" id="nama_barang" class="input input-bordered w-full max-w-xs">
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">gambar</label>
                                <input type="file" name="gambar" id="nama_barang" class="input">
                            </div>
                        </form>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn ">Tutup</button>
                                <button class="btn btn-primary ml-2">Tambah</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
            <div class="divider"></div>
            <div class="overflow-x-auto w-[95%]">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama barang</th>
                            <th>harga</th>
                            <th>deskripsi</th>
                            <th>jumlah stok</th>
                            <th>ditambahkan</th>
                            <th>terakhir edit</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr class="hover:bg-base-200">
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                        </tr
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection