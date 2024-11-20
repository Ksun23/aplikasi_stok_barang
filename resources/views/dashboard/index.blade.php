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
                <div>
                    <h1 class="text-4xl font-bold text-center">Data Barang</h1>
                </div>
                <a class="btn btn-primary " onclick="my_modal_1.showModal()">+ Tambah Barang</a>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <h1 class="font-bold text-3xl">Tambahkan Barang</h1>
                        <form class="my-[1cm] flex flex-col gap-5" action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid row gap-3 items-center">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="harga_barang">Harga Barang</label>
                                <input type="number" name="harga_barang" id="harga_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="deskripsi_barang">Deskripsi Barang</label>
                                <textarea class="textarea textarea-bordered w-[69%]" name="deskripsi_barang"></textarea>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="stok_barang">Stok Barang</label>
                                <input type="number" name="stok_barang" id="stok_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="gambar_barang">Gambar</label>
                                <input type="file" name="gambar_barang" id="gambar_barang" class="input">
                            </div>
                            <div class="modal-action">
                                <button type="button" class="btn" onclick="my_modal_1.close()">Tutup</button>
                                <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                            </div>
                        </form>
                    </div>
                </dialog>
                <!-- Add Edit Modal -->
                <dialog id="edit_modal" class="modal">
                    <div class="modal-box">
                        <h1 class="font-bold text-3xl">Edit Barang</h1>
                        <form class="my-[1cm] flex flex-col gap-5" action="" method="POST" enctype="multipart/form-data" id="edit_form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="edit_id">
                            <div class="grid row gap-3 items-center">
                                <label for="edit_nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="edit_nama_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="edit_harga_barang">Harga Barang</label>
                                <input type="number" name="harga_barang" id="edit_harga_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="edit_deskripsi_barang">Deskripsi Barang</label>
                                <textarea class="textarea textarea-bordered w-[69%]" name="deskripsi_barang" id="edit_deskripsi_barang"></textarea>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="edit_stok_barang">Stok Barang</label>
                                <input type="number" name="stok_barang" id="edit_stok_barang" class="input input-bordered max-w-xs" required>
                            </div>
                            <div class="grid row gap-3 items-center">
                                <label for="edit_gambar_barang">Gambar</label>
                                <input type="file" name="gambar_barang" id="edit_gambar_barang" class="input">
                            </div>
                            <div class="modal-action">
                                <button type="button" class="btn" onclick="edit_modal.close()">Tutup</button>
                                <button type="submit" class="btn btn-primary ml-2">Update</button>
                            </div>
                        </form>
                    </div>
                </dialog>
            </div>
            <div class="divider"></div>
            <div class="overflow-x-auto w-[95%]">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Gambar barang</th>
                            <th>Nama barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Jumlah stok</th>
                            <th>CreatedAT</th>
                            <th>UpdateAT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $item)
                        <tr class="hover:bg-primary hover:text-white ">
                            <td>{{ $item->id }}</td>
                            <td><img src="{{ asset('storage/' . $item->gambar_barang) }}" alt="{{ $item->nama_barang }}" width="50"></td>
                            <td>{{ $item->nama_barang }}</td>
                            <td></td>
                            <td>{{ $item->harga_barang }}</td>
                            <td>{{ $item->deskripsi_barang }}</td>
                            <td>{{ $item->stok_barang }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <button class="btn btn-warning text-white" onclick="openEditModal(JSON.parse('{{ $item->toJson() }}'))">Edit</button>
                                <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error text-white ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add JavaScript to open the modal and populate the form -->
<script>
    function openEditModal(item) {
        document.getElementById('edit_id').value = item.id;
        document.getElementById('edit_nama_barang').value = item.nama_barang;
        document.getElementById('edit_harga_barang').value = item.harga_barang;
        document.getElementById('edit_deskripsi_barang').value = item.deskripsi_barang;
        document.getElementById('edit_stok_barang').value = item.stok_barang;
        document.getElementById('edit_form').action = "{{ route('dashboard.update', '') }}/" + item.id;
        edit_modal.showModal();
    }
</script>
@endsection