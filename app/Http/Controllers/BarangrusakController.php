<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangrusakController extends Controller
{
    function Barangrusak() {
        return view('dashboard.barangrusak.index');
    }
}
