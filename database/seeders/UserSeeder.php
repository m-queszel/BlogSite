<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(5)->create();

        User::factory()->count(50)->has(
            Post::factory(3)->afterCreating(function ($post) use ($tags) {
                // Randomize tag count (between 0 and 5)
                $count = rand(0, 5);
                if ($count > 0) {
                    // Get random tags
                    $randomTags = $tags->random($count);
                    $post->tags()->attach($randomTags);
                }
            })
        )->create();
    }
}
