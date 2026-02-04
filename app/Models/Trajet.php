<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{

    public function trajetRoutes()
    {
        return $this->hasMany(TrajetsRoutes::class, 'trajet_id');
    }
}
