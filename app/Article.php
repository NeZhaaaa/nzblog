<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    // protected $fillable = ['title', 'author', 'body','category', 'extra'];

    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    //Model relationship one2one
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

     //Model relationship one2one
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
 

    //Model relationship one2many
    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    //Model relationship many2many
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    //添加一条评论
    public function addComment()
    {
        $this->comments()->create(['body' => request('body')]);
    }

    /**
     * 文章按日期的归档查询
     *
     * @param [query] $query
     * @param [array] $filter ['year' =>'', 'month' => '']
     * @return void
     */
    public function scopeDateFilter($query, $filter)
    {
        if ($year = $filter['year']) {
            $query->whereYear('created_at', $year);
        }

        if ($month = $filter['month']) {
            $query->whereMonth('created_at', $month);
        }
    }

    /**
     * 归档的列表
     *
     * @return array
     */
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, month(created_at) month, COUNT(*) count')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    /**
     * 获取上一篇文章
     *
     * @return Article
     */
    public function getPreview()
    {
        return static::select('id', 'title')
            ->where('subject_id', '=', $this->subject_id)
            ->where('category_id', '=', $this->category_id)
            ->where('id', '<', $this->id)
            ->orderby('id', 'desc')
            ->first();
    }

    /**
     * 获取下一篇文章
     *
     * @return Article
     */
    public function getNext()
    {
        return static::select('id','title')
            ->where('subject_id', '=', $this->subject_id)
            ->where('category_id', '=', $this->category_id)
            ->where('id', '>', $this->id)
            ->first();
    }

}
