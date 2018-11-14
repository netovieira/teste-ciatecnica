<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostumerEnterprise extends Model
{
    protected $fillable = ['document', 'social_name', 'business_name'];

    public function Costumer(){
        return $this->morphOne(Costumer::class, 'costumer_type');
    }
}
