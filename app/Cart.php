<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'cars_id', 'users_id'
    ];

    protected $hidden = [

    ];

    public function car()
    {
        return $this->hasOne(Car::class, 'id', 'cars_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
