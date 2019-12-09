<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description','type','status','user_id'
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
