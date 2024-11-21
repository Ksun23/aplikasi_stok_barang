<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class TambahcategoryController extends Controller
{
    public function TambahCategory()
    {
        $categories = Kategori::all(); // Ambil semua kategori
        return view('dashboard.tambahcategory.index', ['categories' => $categories]);
    }
}
