<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = ['costumer_type', 'zipcode', 'address', 'number', 'complement', 'neighborhood', 'city', 'state'];

    public function CostumerType(){
        return $this->morphTo();
    }
}
