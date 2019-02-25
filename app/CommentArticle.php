<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    protected  $table   = 'comment_articles';

    protected $fillable = ['title','article_id','name'];
}
