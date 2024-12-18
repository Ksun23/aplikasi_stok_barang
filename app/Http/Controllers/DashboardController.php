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
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar_barang')) {
            $image = $request->file('gambar_barang');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Change storage path
            $path = $request->file('gambar_barang')->storeAs('gambar_barang', $imageName, 'public');
            $validatedData['gambar_barang'] = 'gambar_barang/' . $imageName;
        }

        Barang::create($validatedData);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok_barang' => 'required|integer',
            'jumlah_rusak' => 'nullable|integer',
            'deskripsi_barang' => 'nullable|string',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Calculate new stock
        $newStok = $request->stok_barang;
        if (isset($validatedData['jumlah_rusak'])) {
            $newStok = $request->stok_barang - $validatedData['jumlah_rusak'];
        }
        $validatedData['stok_barang'] = $newStok;

        if ($request->hasFile('gambar_barang')) {
            // Delete old image
            if ($barang->gambar_barang) {
                Storage::delete('public/gambar_barang/' . $barang->gambar_barang);
            }

            // Store new image
            $image = $request->file('gambar_barang');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $request->file('gambar_barang')->storeAs('gambar_barang', $imageName, 'public');
            $validatedData['gambar_barang'] = $path; // Simpan path lengkap yang sesuai

        }

        $barang->update($validatedData);

        // Update damaged items record
        $barang->barangRusak()->updateOrCreate(
            [],
            ['jumlah_rusak' => $validatedData['jumlah_rusak'] ?? 0]
        );

        return redirect()->back()->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Delete image if exists
        if ($barang->gambar_barang) {
            Storage::delete('public/gambar_barang/' . $barang->gambar_barang);
        }

        $barang->delete();
        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil dihapus.');
    }
}
