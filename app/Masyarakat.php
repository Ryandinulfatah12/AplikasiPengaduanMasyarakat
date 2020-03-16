<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';

    public function pengaduan()
    {
        return $this->hasMany('App\Pengaduan');
    }
}
