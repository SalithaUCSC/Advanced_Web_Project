<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wishlist';
    // primary key
    public $primaryKey = 'id';

    public function wishPhone(){
        return $this->belongsTo('App\Phone');
    }


}
