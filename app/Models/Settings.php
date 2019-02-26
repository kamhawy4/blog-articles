<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected  $table   = 'settings';

    protected $fillable = ['name_site','email','logo','address','fav','brief_site','phone','meta_keywords','meta_description'];
}
