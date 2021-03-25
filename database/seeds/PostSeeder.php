<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) { 

            $newPost = new Post();

            $userCount = count(User::all()->toArray());

            $newPost->title = $faker->sentence(3);
            $newPost->user_id = rand(1, $userCount);

            $slug = Str::slug($newPost->title);
            $memorySlug = $slug;
            $sameSlug = Post::where('slug', $slug)->first();
            $counter = 1;
            while ($sameSlug) {
                $slug = $memorySlug . '-' . $counter;
                $sameSlug = Post::where('slug', $slug)->first();
                $counter++;
            }
            $newPost->slug = $slug;

            $newPost->content = $faker->text(70);

            $newPost->save();
        }
    }
}
