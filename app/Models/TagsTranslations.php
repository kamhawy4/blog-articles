<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsTranslations extends Model
{
    protected  $table   = 'tags_translations';

    protected $fillable = ['name','slug','tags_id','language'];
}
