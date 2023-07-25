<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::with('kategori','supplier')->limit(10);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('kategori.nama', function ($q){
                        $kategori = !empty($q->kategori->nama) ? $q->kategori->nama : '-';
                        return $kategori;
                        // return $q->kategori->nama;
                    })
                    ->editColumn('supplier.nama', function ($q){
                        $supplier = !empty($q->supplier->nama) ? $q->supplier->nama : '-';
                        return $supplier;
                        // return $q->supplier->nama;
                    })
                    ->addColumn('action', function($row){
                        $actionBtn = '
                            <a href="javascript:void(0)" data-toggle="tooltip" id="btn-edit" data-id="'.$row->id.'" class="edit btn btn-success btn-md">Edit</a> 
                            <a href="javascript:void(0)" data-toggle="tooltip" id="btn-delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-md">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.produk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produk::updateOrCreate([
            'id' => $request->id
        ],
        [
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'deskripsi' =>$request->deskripsi,
            'satuan' =>$request->satuan,
            'stok' =>$request->stok,
            'harga_beli' =>$request->harga_beli,
            'harga_jual' =>$request->harga_jual,
            'harga_jual' =>$request->harga_jual,
            'kategori_id' =>$request->kategori_id,
            'supplier_id' =>$request->supplier_id,
        ]);

        return response()->json(['success' => 'Kategori berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $data = Produk::with(['kategori', 'supplier'])->findOrFail($produk->id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Supplier',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Produk::find($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Supplier berhasil dihapus',
            'data' => $data
        ]);
    }

    public function kategori()
    {
        $data = Kategori::where('nama', 'LIKE', '%'.request('q').'%')->paginate(5);

        return response()->json($data);
    }

    public function supplier()
    {
        $data = Supplier::where('nama', 'LIKE', '%'.request('q').'%')->paginate(5);

        return response()->json($data);
    }

    public function kodeProduk() 
    {
        $maxNo = DB::table('produks')->max('kode_produk');
        $urutan = (int) substr($maxNo, 2, 3);
        $urutan++;
        $huruf = "PR";
        $data = $huruf . sprintf("%03s", $urutan);

        return response()->json([
            'success' => true,
            'message' => 'Kode Produk dibuat',
            'data' => $data,
        ]);
    }

}
