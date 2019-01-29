<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    public    $timestamps   = false;
    protected $table        = 'loai';
    protected $fillable     = ['l_ten'];
    protected $guarded      = ['l_ma'];
    protected $primaryKey   = 'l_ma';
    public function cacSanPham()
    {
        return $this->hasMany('App\Sanpham', 'l_ma', 'l_ma');
    }
}
