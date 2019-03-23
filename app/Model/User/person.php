<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $table = 'persons';

    public function devices()
    {
        return $this->belongsToMany('App\Model\User\devices','device_persons');//set up the relationship between news and newscategory
    }
    public function getRouteKeyName()//set up the route by slug
    {
        return 'slug';
    }
}
