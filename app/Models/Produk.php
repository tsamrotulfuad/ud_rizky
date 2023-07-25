<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'deskripsi',
        'satuan',
        'stok',
        'harga_beli',
        'harga_jual',
        'harga_jual',
        'kategori_id',
        'supplier_id',
    ];

    public function kategori() : BelongsTo {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function supplier() : BelongsTo {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

}
