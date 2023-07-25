<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        $total_kategori = DB::table('kategoris')->count();
        $total_produk   = DB::table('produks')->count();
        $total_supplier = DB::table('suppliers')->count();
        return view('admin/dashboard', compact('total_kategori', 'total_produk', 'total_supplier'));
    }
}
