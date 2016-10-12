<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name', 'artist', 'link', 'extra'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
