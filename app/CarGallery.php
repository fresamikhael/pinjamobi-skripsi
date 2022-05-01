<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarGallery extends Model
{
    protected $fillable = [
        'photos', 'cars_id'
    ];

    protected $hidden = [

    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'cars_id', 'id');
    }
}
