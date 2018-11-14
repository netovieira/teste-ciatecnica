<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostumerPeople extends Model
{
    protected $fillable = ['document', 'name', 'last_name', 'birthday'];

    public function Costumer(){
        return $this->morphOne(Costumer::class, 'costumer_type');
    }
}
