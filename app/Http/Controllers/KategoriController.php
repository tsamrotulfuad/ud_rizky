<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Kategori::limit(5))
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '
                            <a href="javascript:void(0)" data-toggle="tooltip" id="btn-edit" data-id="'.$row->id.'" class="edit btn btn-success btn-md">Edit</a> 
                            <a href="javascript:void(0)" data-toggle="tooltip" id="btn-delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-md">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.kategori');
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
        Kategori::updateOrCreate([
            'id' => $request->id
        ],
        [
            'nama' => $request->nama,
            'deskripsi' =>$request->deskripsi
        ]);

        return response()->json(['success' => 'Kategori berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kategori',
            'data' => $kategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
