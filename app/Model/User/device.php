<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    public function molds()
    {
        return $this->belongsToMany('App\Model\User\mold','device_molds')->withTimestamps();
    }
    public function persons()
    {
        return $this->belongsToMany('App\Model\User\person','device_persons')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
