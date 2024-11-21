<?php ?>
@extends('layout')

@section('title', 'Tambah Kategori')

@section('content')
<div class="w-[100%] h-screen">
    <div class="grid grid-cols-5 grid-rows-1 px-[2.6cm] pt-[1cm]">
        <div class="col-span-1 flex">
            <h1 class="text-4xl font-bold text-center">Dashboard</h1>
        </div>
        <div class="col-span-4">
            <h1 class="text-4xl font-bold">Tambah Kategori Baru</h1>
        </div>
    </div>
    <div class="divider"></div>
    <div class="grid grid-cols-5 grid-rows-1">
        <div class="cols-span-1 pl-[1.7cm]">
            <x-menu-component />
        </div>
        <div class="col-span-4 pr-[2.6cm]">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-control mb-4">
                    <label class="label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="input input-bordered" required>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                    <a href="{{ route('dashboard.tambahcategory.index') }}" class="btn">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection