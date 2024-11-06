<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function Dashboard()
    {
        return view('dashboard.index');
    }

    public function tambahbarang(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->gambar = $imageName;
        $barang->save();

        return redirect('/dashboard')->with('success', 'Barang berhasil ditambahkan');        
    }
}
