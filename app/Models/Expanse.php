<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
    protected $fillable = ['people_id', 'reason', 'amount', 'expanse_date'];

    public function people(){
        return $this->belongsTo(People::class);
    }
}
