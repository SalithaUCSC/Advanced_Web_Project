<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyRev extends Model
{
    // table name
    protected $table = 'review_replies';
    // primary key
    public $primaryKey = 'reply_id';

    public function review(){
        return $this->belongsTo('App\Review');
    }
}
