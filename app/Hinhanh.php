<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    public    $timestamps   = false;
    protected $table        = 'hinhanh';
    protected $fillable     = ['ha_ten'];
    protected $guarded      = ['ha_ma', 'bd_ma'];
    protected $primaryKey   = ['ha_ma', 'bd_ma'];
    public    $incrementing = false;
    //  public function baiDang()
    // {
    // 	return $this->belongsTo('App\Baidang', 'bd_ma', 'bd_ma');
    // }
    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
