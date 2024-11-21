<?php

namespace App\Http\Controllers;

use App\Models\BarangRusak;
use Illuminate\Http\Request;

class BarangRusakController extends Controller
{
    public function index()
    {
        $barangRusak = BarangRusak::with(['barang', 'barang.kategori'])->get();
        return view('dashboard.barangrusak.index', compact('barangRusak'));
    }

    public function destroy($id)
    {
        $barangRusak = BarangRusak::findOrFail($id);
        $barangRusak->delete();
        return redirect()->back()->with('success', 'Data barang rusak berhasil dihapus');
    }

    public function recover($id)
    {
        $barangRusak = BarangRusak::findOrFail($id);
        // Restore stock
        $barang = $barangRusak->barang;
        $barang->stok_barang += $barangRusak->jumlah_rusak;
        $barang->save();
        
        $barangRusak->delete();
        return redirect()->back()->with('success', 'Barang berhasil dipulihkan ke stok');
    }
}
