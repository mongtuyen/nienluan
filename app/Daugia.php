<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daugia extends Model
{
    public    $timestamps   = false;
    protected $table        = 'daugia';
    protected $fillable     = ['dg_noiDung','nd_ma','dg_khoiLuong','dg_trangThai', 'bd_ma','dg_time'];
    protected $guarded      = ['dg_ma'];
    protected $primaryKey   = 'dg_ma';
    public    $incrementing = false;
    protected $dates        = ['dg_time'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
     function nguoidung(){
        return $this->belongsTo('App\User', 'nd_ma','nd_ma');
    }
}
