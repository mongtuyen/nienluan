<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    public    $timestamps   = false;
    protected $table        = 'nguoidung';
    protected $fillable     = ['nd_hoTen', 'nd_taiKhoan', 'nd_matKhau', 'nd_email','nd_ngaySinh','nd_dienThoai', 'nd_diaChi','nd_gioiTinh','q_ma'];
    protected $guarded      = ['nd_ma'];
    protected $primaryKey   = 'nd_ma';
    protected $dates        = ['nd_ngaySinh'];
    protected $hidden = [
        'nd_matKhau',
    ];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function quyen(){
        return $this->belongsTo('App\Quyen', 'q_ma','q_ma');
    }
    public function baiDang()
    {
        return $this->hasMany('App\Baidang', 'nd_ma', 'nd_ma');
    }
}
