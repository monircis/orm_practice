<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description',
    ];


    public function user()
    {
        //withDefault will add default  name value  if  name is  null
        return $this->belongsTo(User::class)->withDefault(
            [
                'name' => 'Default User'
            ]
        );
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id')->withTimestamps();
    }
}
