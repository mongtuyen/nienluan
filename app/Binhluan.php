<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    public    $timestamps   = false;
    protected $table        = 'binhluan';
    protected $fillable     = ['bl_noiDung','nd_ma','bd_ma','bl_time'];
    protected $guarded      = ['bl_ma'];
    protected $primaryKey   = ['bl_ma'];
    public    $incrementing = false;
    protected $dates        = ['bl_time'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
     function nguoidung(){
        return $this->belongsTo('App\User', 'nd_ma','nd_ma');
    }
}
