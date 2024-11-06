@extends('layout')

@section('title')
StokBarang.id | Dashboard
@endsection

@section('content')
<div class="w-[100%] h-screen">
    <div class="grid grid-cols-4 grid-rows-1 mt-[1cm]">
        <div class="px-[3cm] col-span-1">
            <x-menuadmin-component />
        </div>
        <div class="col-span-3 py-[1.9cm]">
            <div class="flex justify-between pr-[1.5cm]">
                <h1 class="text-4xl font-bold text-center">Data Barang</h1>
                <a class="btn btn-primary" onclick="my_modal_1.showModal()">+ Tambah</a>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <h1 class="font-bold text-3xl">Tambahkan Barang</h1>
                        <form class="my-[1cm] flex flex-col gap-5" action="">
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Nama barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="input input-bordered max-w-xs">
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Deskripsi Barang</label>
                                <textarea class="textarea textarea-bordered w-[69%]" placeholder="Bio"></textarea>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Jumlah Barang</label>
                                <input type="number" name="nama_barang" id="nama_barang" class="input input-bordered w-full max-w-xs">
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr class="hover:bg-base-200">
                            <th></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection