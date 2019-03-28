<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'nd_name', 'nd_email', 'username', 'password','nd_ngaySinh','nd_dienThoai', 'nd_diaChi','nd_gioiTinh','q_ma'
    ];

    /**
     * The attributes that shongaySinhuld be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public    $timestamps   = false;
    protected $guarded      = ['nd_ma'];
    protected $primaryKey   = 'nd_ma';
    protected $dates        = ['nd_ngaySinh'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function quyen(){
        return $this->belongsTo('App\Quyen', 'q_ma','q_ma');
    }
    public function baiDang()
    {
        return $this->hasMany('App\Baidang', 'nd_ma', 'nd_ma');
    }

    public function bLuan()
    {
        return $this->hasMany('App\Binhluan', 'nd_ma', 'nd_ma');
    }

}
