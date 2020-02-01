<?php

namespace Freefall\Follow\Traits;


use Freefall\Follow\Like;
use Freefall\Follow\Test\User;

trait CanBeLiked
{
    public function likers()
    {
        $likerIds = Like::where(['liked_id' => $this->id])->get()->map->liker_id;
        return User::whereIn('id', $likerIds)->get();
    }
}