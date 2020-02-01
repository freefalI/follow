<?php

namespace  Freefall\Follow;
use Illuminate\Database\Eloquent\Model;

class Like extends  Model
{
    protected  $fillable = [
        'liker_id',
        'liked_id'
    ];
}