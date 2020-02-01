<?php

namespace Freefall\Follow\Test;


use Freefall\Follow\Traits\CanBeLiked;
use Freefall\Follow\Traits\CanLike;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use CanLike;
    use CanBeLiked;

    protected $fillable = ['name'];
}