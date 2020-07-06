<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $fillable = ['description', 'date_init', 'date_finish', 'status', 'area_id'];

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
