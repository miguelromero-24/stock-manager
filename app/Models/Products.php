<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['description', 'code', 'origin', 'unit_measure', 'price', 'brand'];

}
