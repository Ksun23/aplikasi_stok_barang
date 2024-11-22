<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $barang = Barang::paginate(10); // Mengambil 10 item per halaman
        return view('dashboard.index', compact('barang'));
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('dashboard.tambah', compact('kategoris'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategoris = Kategori::all();
        return view('dashboard.edit', compact('barang', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|integer',
            'deskripsi_barang' => 'nullable|string',
            'gambar_barang' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar_barang')) {
            $path = $request->file('gambar_barang')->store('public/gambar_barang');
            $validatedData['gambar_barang'] = basename($path);
        }

        Barang::create($validatedData);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric', 
            'stok_barang' => 'required|integer',
            'deskripsi_barang' => 'nullable|string',
            'gambar_barang' => 'nullable|image|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah_rusak' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('gambar_barang')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar_barang) {
                Storage::delete('public/gambar_barang/' . $barang->gambar_barang);
            }

            $path = $request->file('gambar_barang')->store('public/gambar_barang');
            $validatedData['gambar_barang'] = basename($path);
        }

        $barang->update($validatedData);

        return redirect()->back()->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil dihapus.');
    }
}
