<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $table = 'stocks';

    protected $filliable = ['product_id', 'tender_id', 'quantity', 'given', 'to_give'];
}
