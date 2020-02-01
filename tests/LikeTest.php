<?php

namespace Freefall\Follow\Test;

use Freefall\Follow\Like;

class LikeTest extends TestCase
{
    /** @test */
    public function can_like()
    {
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user1->like($user2);
        $user1->like($user2);
        $likes = Like::all()->toArray();
        dump($likes);
        $likers = $user2->likers();
        dump($likers->toArray());
        $this->assertEquals(44, 44);
    }

}