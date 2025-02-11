<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quyen extends Model
{
    public    $timestamps   = false;
    protected $table        = 'quyen';
    protected $fillable     = ['q_ten'];
    protected $guarded      = ['q_ma'];
    protected $primaryKey   = 'q_ma';
    
    public function nguoiDung()
    {
        return $this->hasMany('App\Nguoidung', 'nd_ma', 'nd_ma');
    }
}
