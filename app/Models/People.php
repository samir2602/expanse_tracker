<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name', 'slug'];

    public function expanse(){
        return $this->hasMany(Expanse::class);
    }
}
