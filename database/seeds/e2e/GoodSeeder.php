<?php

use App\Good;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class GoodSeeder extends Seeder
{
    public function run()
    {
        $users = User::with('followings')->get();

        $users->each(function ($user) {
            $follow_user_ids = $user->followings->pluck('follow_user_id');

            $timeline = Post::wherein('user_id', $follow_user_ids)->get();
            $timeline->random(10)->each(function ($post) use ($user) {
                Good::create([
                    'user_id' => $user->user_id,
                    'post_id' => $post->post_id
                ]);
            });
        });
    }
}
