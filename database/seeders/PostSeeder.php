<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// models
use App\Models\Post;
use App\Models\Type;


// helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            // Post::truncate();
            Schema::withoutForeignKeyConstraints(function () {
                Post::truncate();
            });
    

            for ($i = 0; $i < 10; $i++){
            $titleForMassAssignment = fake()->sentence();
            $slugForMassAssignment = Str::slug($titleForMassAssignment);
            $post = Post::create([
                'title'=> $titleForMassAssignment,
                'slug'=>$slugForMassAssignment,
                'content'=> fake()->paragraph(),
                'type_id'=> Type::inRandomOrder()->first()->id,
            ]);
        }

    }
}
