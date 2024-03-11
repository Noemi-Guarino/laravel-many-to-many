<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //questa funzione 
        //mi permette di eseguire grazie al comando tutti i seeder
        $this->call([
            TypeSeeder::class,
            PostSeeder::class,
            TechnologySeeder::class,
            PostTechnologyRelationshipSeeder::class
        ]);
    }
}
