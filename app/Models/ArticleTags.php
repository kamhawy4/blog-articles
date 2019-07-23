<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    protected  $table   = 'article_tags';

    protected $fillable = ['tag_id','article_id'];

}
