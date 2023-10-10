<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    //protected $table = 'category';
    //protected $primaryKey = 'id_kategori'; // Kolom yang menjadi primary key
    //protected $fillable = ['nama']; // Kolom yang dapat diisi
    protected $guarded = [];

    //definisikan relasi dengan model produk
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
