<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'petugas';
    protected $guarded = ['id','created_at','updated_at'];

    
}
