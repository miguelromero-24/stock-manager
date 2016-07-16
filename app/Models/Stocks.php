<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $table = 'stocks';

    protected $fillable = ['product_id', 'available_quantity', 'requested_quantity', 'total_quantity'];

    /**
     * Get the product associated with the stock
     */
    public function phone()
    {
        return $this->hasOne('App\Models\Products', 'product_id');
    }
}
