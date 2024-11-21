@extends('layout')

@section('title', 'Edit Kategori')

@section('content')
<div class="w-[100%] p-8 ml-[2cm]">
    <h1 class="text-4xl font-bold mb-6">Edit Kategori</h1>
    
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="max-w-2xl">
        @csrf
        @method('PUT')
        
        <div class="form-control mb-4">
            <label class="label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="input input-bordered" value="{{ $kategori->nama_kategori }}" required>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dashboard.tambahcategory.index') }}" class="btn">Batal</a>
        </div>
    </form>
</div>
@endsection