<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // table name
    protected $table = 'reviews';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    // public $timestamps = true;
    public function phone(){
        return $this->belongsTo('App\Phone');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\ReplyRev');
    }


}
