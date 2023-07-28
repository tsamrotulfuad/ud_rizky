<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        //list Total Data
        $total_kategori = DB::table('kategoris')->count();
        $total_produk   = DB::table('produks')->count();
        $total_supplier = DB::table('suppliers')->count();
        $total_pelanggan = DB::table('pelanggans')->count();
        return view('admin/dashboard', compact('total_kategori', 'total_produk', 'total_supplier', 'total_pelanggan'));
    }
}
