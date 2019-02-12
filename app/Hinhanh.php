<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    protected $table        = 'hinhanh';
    protected $fillable     = ['ha_ma', 'ha_ten', 'bd_ma'];
    protected $guarded      = ['ha_ma'];
    protected $primaryKey   = 'ha_ma';
     public function baiDang()
    {
    	return $this->belongsTo('App\Baidang', 'bd_ma', 'bd_ma');
    }
}
