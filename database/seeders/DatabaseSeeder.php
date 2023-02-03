<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ArticleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    $tags = Tag::factory(5)->create()->unique();
    Category::factory(20)->create()->unique();

    User::factory(20)->create()->each(function($user) use($tags) {
            Article::create([
                'user_id' => $user->id,
                'category_id' => $user->id,
                'title' => fake()->sentence(3),
            ])->each(function($article) use($tags) {
                $article->tags()->attach($tags->random(1));
            });
        });

//        $this->call(ArticleSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
