<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    public    $timestamps   = false;
    protected $table        = 'sanpham';
    protected $fillable     = ['sp_ten','l_ma'];
    protected $guarded      = ['sp_ma'];
    protected $primaryKey   = 'sp_ma';
    public function loai()
    {
        return $this->belongsTo('App\Loai', 'l_ma', 'l_ma');
    }
    public function baiDang()
    {
        return $this->hasMany('App\Baidang', 'bd_ma', 'bd_ma');
    }
}
