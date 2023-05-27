<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    
    
    public function run(): void
    {
        // DB::table('users')->delete();
        // DB::table('users')->delete();
        // Category::truncate();
        // Comment::truncate();

        //User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $frontend=Category::create([
        //     'name'=>'frontend',
        //     'slug'=>'frontend'
        // ]);
        // $backend=Category::create([
        //     'name'=>'backend',
        //     'slug'=>'backend'
        // ]);
        // Blog::create([
        //     'title'=>'First Blog',
        //     'slug'=>'first-blog',
        //     'intro'=>'Music is',
        //     'body'=>'Music is so good',
        //     'category_id'=>$frontend->id
        // ]);
        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);
        $fe=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $be=Category::factory()->create(['name'=>'backend','slug'=>'backend']);

        //User::factory()->create();
        Blog::factory(2)->create(['category_id'=>$fe->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$be->id,'user_id'=>$aungaung->id]);

    }
}
