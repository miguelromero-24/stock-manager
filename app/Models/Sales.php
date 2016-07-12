<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $filliable = ['tender_id', 'product_id', 'quantity', 'remission_note'];

}
