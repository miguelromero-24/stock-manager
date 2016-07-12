<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';

    protected $fillable = ['description', 'contact', 'tax_code', 'invoice_name', 'address', 'telephone', 'email', 'status'];

}
