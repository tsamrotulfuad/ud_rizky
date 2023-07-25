<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'telp',
        'alamat'
    ];

    public function produks() : HasMany
    {
        return $this->hasMany(Produk::class, 'supplier_id', 'id');
    }
}
