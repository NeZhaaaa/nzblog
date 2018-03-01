<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    /**
     * 路由的查询key,默认的是id
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * 返回所有有效的标签
     *
     * @return [array] tags
     */
    public static function allTags()
    {
        return static::all();
    }

}
