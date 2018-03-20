<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // table name
    protected $table = 'phone_brands';
    // primary key
    public $primaryKey = 'brand_id';
    // Timestamps
    // public $timestamps = true;
    public function phones(){
        return $this->hasMany('App\Phone');
    }
    
}
