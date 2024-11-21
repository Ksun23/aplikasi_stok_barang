<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('dashboard.tambahcategory.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect()->route('dashboard.tambahcategory.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function create()
    {
        return view('dashboard.tambahcategory.create');
    }
}
