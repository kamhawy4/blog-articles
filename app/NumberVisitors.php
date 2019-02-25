<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumberVisitors extends Model
{
    protected  $table   = 'number_visitors';

    protected $fillable = ['ip','article_id'];
}
