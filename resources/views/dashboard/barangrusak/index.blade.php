@extends ('layout')

@section ('title')
Dashboard | Barang Rusak
@endsection

@section ('content')
<div class="w-[100%] h-screen px-[2cm]">
    <div class="grid grid-cols-5 grid-rows-1 px-[2.6cm] pt-[1cm]">
        <div class="col-span-1 flex">
            <h1 class="text-4xl font-bold text-center">Dashboard</h1>
        </div>
        <div class="col-span-4">
            <h1 class="text-4xl font-bold text-center">Status Barang Rusak</h1>
        </div>
    </div>
    <div class="divider"></div>
    <div class="grid grid-cols-5 grid-rows-1">
        <div class="cols-span-1 pl-[1.7cm]">
            <x-menu-component />
        </div>
        <div class="col-span-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah Rusak</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangRusak as $item)
                    <tr>
                        <td>
                            @if($item->barang->gambar_barang)
                                <img src="{{ asset('storage/' . $item->barang->gambar_barang) }}" 
                                     alt="Gambar {{ $item->barang->nama_barang }}" width="60">
                            @endif
                        </td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->barang->kategori->nama_kategori }}</td>
                        <td>{{ $item->jumlah_rusak }}</td>
                        <td>{{ $item->barang->harga_barang }}</td>
                        <td>{{ $item->barang->deskripsi_barang }}</td>
                        <td>
                            <div class="flex gap-2">
                                <form action="{{ route('barangrusak.destroy', $item->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus data?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error text-white">Hapus</button>
                                </form>
                                
                                <form action="{{ route('barangrusak.recover', $item->id) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Pulihkan barang ini ke stok?');">
                                    @csrf
                                    <button type="submit" class="btn btn-success text-white">Recover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection