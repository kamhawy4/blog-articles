<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id'
    ];

      /**
    * @return Categorie Name with user_id
    */
    public function GetNameUser()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }
    
}
