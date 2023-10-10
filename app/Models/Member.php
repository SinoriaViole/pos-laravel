<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;


   // protected $table = 'member';

    //protected $primaryKey = 'id_member';

    //protected $fillable = ['kode_member', 'nama', 'alamat', 'telepon'];

    protected $guarded = [];
}
