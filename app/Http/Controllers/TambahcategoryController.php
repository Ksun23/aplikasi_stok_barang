<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahcategoryController extends Controller
{
    function TambahCategory() {
        return view('dashboard.tambahcategory.index');
    }
}
