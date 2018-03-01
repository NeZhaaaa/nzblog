<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    //
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    //
    public static function allSubject()
    {
        return static::all();
    }
}
