<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baidang extends Model
{
    public    $timestamps   = false;
    protected $table        = 'baidang';
    protected $fillable     = ['bd_tieuDe','bd_ngayDang','bd_ngayHetHan','bd_hinh','bd_noiDung','bd_khoiLuong','bd_gia','bd_trangThaisp','bd_loai','nd_ma','sp_ma'];
    protected $guarded      = ['bd_ma'];
    protected $primaryKey   = 'bd_ma';
    protected $dates        = ['bd_ngayDang','bd_ngayHetHan'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    
  
    public function nguoidung(){
        return $this->belongsTo('App\User', 'nd_ma','nd_ma');
    }
    public function thuocSanPham(){
        return $this->belongsTo('App\Sanpham', 'sp_ma','sp_ma');
    }
    public function hinhAnh()
    {
        return $this->hasMany('App\Hinhanh', 'bd_ma', 'bd_ma');
    }
    public function binhLuan()
    {
        return $this->hasMany('App\Binhluan', 'bd_ma', 'bd_ma');
    }
}
