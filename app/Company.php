<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $fillable = ['name', 'address'];

    public function customers(){
        return $this->hasMany('App\Customer');
    }
}
