<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // table name
    protected $table = 'likes';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
}
