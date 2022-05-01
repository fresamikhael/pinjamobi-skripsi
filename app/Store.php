<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', 'lat', 'long', 'barcode', 'barcode_image'
    ];
}
