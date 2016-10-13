<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dislike extends Model
{
    use SoftDeletes;

    protected $table = 'dislikeables';

    protected $fillable = [
        'user_id',
        'dislikeable_id',
        'dislikeable_type',
    ];

    public function products()
    {
        return $this->morphedByMany('App\Product', 'dislikeable');
    }


    public function posts()
    {
        return $this->morphedByMany('App\Post', 'dislikeable');
    }
}
