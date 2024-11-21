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
        $barang = Barang::all(); // Ambil semua barang
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('dashboard.index', ['barang' => $barang, 'kategoris' => $kategoris]);
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

        // Calculate previous damaged items
        $previousDamaged = $barang->barangRusak ? $barang->barangRusak->jumlah_rusak : 0;
        $newDamaged = $request->input('jumlah_rusak', 0);

        // Adjust stock based on damaged items difference
        $stockAdjustment = $newDamaged - $previousDamaged;
        $validatedData['stok_barang'] = $barang->stok_barang - $stockAdjustment;

        // Update the barang
        $barang->update($validatedData);

        // Update damaged items record
        $barang->barangRusak()->updateOrCreate(
            ['barang_id' => $barang->id],
            ['jumlah_rusak' => $newDamaged]
        );

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil dihapus.');
    }
}
