<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $barang = Barang::all();
        return view('dashboard.index', ['barang' => $barang]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|integer',
            'deskripsi_barang' => 'nullable|string',
            'gambar_barang' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar_barang')) {
            $validatedData['gambar_barang'] = $request->file('gambar_barang')->store('barang_images', 'public');
        }

        Barang::create($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil ditambahkan.');
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
        ]);

        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->harga_barang = $validatedData['harga_barang'];
        $barang->deskripsi_barang = $validatedData['deskripsi_barang'];
        $barang->stok_barang = $validatedData['stok_barang'];

        if ($request->hasFile('gambar_barang')) {
            // Hapus gambar lama
            if ($barang->gambar_barang) {
                Storage::disk('public')->delete($barang->gambar_barang);
            }

            // Simpan gambar baru
            $validatedData['gambar_barang'] = $request->file('gambar_barang')->store('barang_images', 'public');
            $barang->gambar_barang = $validatedData['gambar_barang'];
        }

        $barang->save();

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil dihapus.');
    }
}
