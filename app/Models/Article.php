<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'count_like',
        'count_watch',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
