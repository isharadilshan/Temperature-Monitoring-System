<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class mold extends Model
{
    public function devices()
    {
        return $this->belongsToMany('App\Model\User\device','device_molds');//set up the relationship between news and newstags
    }
    public function getRouteKeyName()//set up the route by slug
    {
        return 'slug';
    }
}
