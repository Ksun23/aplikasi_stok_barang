<?php ?>
@extends('layout')

@section('title', 'Edit Barang')

@section('content')
<div class="w-[100%] p-8 ml-[2cm]">
    <h1 class="text-4xl font-bold mb-6">Edit Barang</h1>
    
    <form action="{{ route('dashboard.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @method('PUT')
        
        <div class="form-control mb-4">
            <label class="label">Nama Barang</label>
            <input type="text" name="nama_barang" class="input input-bordered" value="{{ $barang->nama_barang }}" required>
        </div>
        
        <div class="form-control mb-4">
            <label class="label">Harga Barang</label>
            <input type="number" name="harga_barang" class="input input-bordered" value="{{ $barang->harga_barang }}" required>
        </div>
        
        <div class="form-control mb-4">
            <label class="label">Stok Barang</label>
            <input type="number" name="stok_barang" class="input input-bordered" value="{{ $barang->stok_barang }}" required>
        </div>
        
        <div class="form-control mb-4">
            <label class="label">Deskripsi Barang</label>
            <textarea name="deskripsi_barang" class="textarea textarea-bordered">{{ $barang->deskripsi_barang }}</textarea>
        </div>
        
        <div class="form-control mb-4">
            <label class="label">Gambar Barang</label>
            @if($barang->gambar_barang)
                <img src="{{ asset('storage/' . $barang->gambar_barang) }}" alt="Current Image" class="w-32 mb-2">
            @endif
            <input type="file" name="gambar_barang" class="file-input file-input-bordered">
        </div>
        
        <div class="form-control mb-4">
            <label class="label">Jumlah Barang Rusak</label>
            <input type="number" name="jumlah_rusak" class="input input-bordered" value="{{ $barang->barangRusak->jumlah_rusak ?? 0 }}" min="0">
        </div>
        
        <div class="form-control mb-6">
            <label class="label">Kategori</label>
            <select name="kategori_id" class="select select-bordered" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dashboard.index') }}" class="btn">Batal</a>
        </div>
    </form>
</div>
@endsection