<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    //belongs to Article
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

}
