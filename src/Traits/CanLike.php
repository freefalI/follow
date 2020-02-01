<?php

namespace Freefall\Follow\Traits;

use Freefall\Follow\Like;

trait CanLike
{
    public function like($liked)
    {
        Like::create([
            'liker_id' => $this->id,
            'liked_id' => $liked->id
        ]);
    }
}