<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','code','description','author','total','status','category_id','user_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
