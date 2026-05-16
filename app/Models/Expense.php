<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['people_id', 'reason', 'amount', 'expense_date'];

    public function people(){
        return $this->belongsTo(People::class);
    }
}
