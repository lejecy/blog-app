<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Demo Author',
            'email' => 'demo@blogapp.test',
        ]);

        Post::factory(12)->create(['user_id' => $user->id]);

        // Add a few unpublished drafts for the author
        Post::factory(2)->unpublished()->create(['user_id' => $user->id]);
    }
}
