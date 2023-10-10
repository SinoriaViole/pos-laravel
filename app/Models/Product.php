<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;

   // protected $table = 'product';
   // protected $primaryKey = 'id_produk';
    //protected $guarded = [];

    // Definisikan relasi dengan model Kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
