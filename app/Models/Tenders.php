<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    protected $table = 'tenders';

    protected $fillable = ['description', 'client_id', 'contract_number', 'awarded_amount', 'tender_type', 'date_init',
        'date_end', 'created_at', 'updated_at'];

    public function client()
    {
        return $this->hasOne('App\Models\Clients', 'id', 'client_id');
    }
}
