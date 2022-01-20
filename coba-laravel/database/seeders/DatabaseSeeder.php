<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Habil',
            'username' => 'habil666',
            'email' => 'habil@gmail.com',
            'password' => bcrypt('habil123')
        ]);

        // User::create([
        //     'name' => 'Luffy',
        //     'email' => 'luffy@gmail.com',
        //     'password' => bcrypt('luffy123')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur dolor impedit odit eos voluptates commodi? Eligendi veniam quam atque dolore dolorum! Expedita commodi eos voluptatum eligendi dolores delectus accusamus dolor quis inventore perspiciatis aperiam sint eius sequi sunt perferendis ex repudiandae, obcaecati ad soluta! Adipisci nihil sint consequuntur fugiat, consequatur nobis aut culpa vel sequi voluptates dolor quia perspiciatis! Autem, facilis. Iure sint quas commodi vel qui, incidunt eaque doloribus!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur dolor impedit odit eos voluptates commodi? Eligendi veniam quam atque dolore dolorum! Expedita commodi eos voluptatum eligendi dolores delectus accusamus dolor quis inventore perspiciatis aperiam sint eius sequi sunt perferendis ex repudiandae, obcaecati ad soluta! Adipisci nihil sint consequuntur fugiat, consequatur nobis aut culpa vel sequi voluptates dolor quia perspiciatis! Autem, facilis. Iure sint quas commodi vel qui, incidunt eaque doloribus!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur dolor impedit odit eos voluptates commodi? Eligendi veniam quam atque dolore dolorum! Expedita commodi eos voluptatum eligendi dolores delectus accusamus dolor quis inventore perspiciatis aperiam sint eius sequi sunt perferendis ex repudiandae, obcaecati ad soluta! Adipisci nihil sint consequuntur fugiat, consequatur nobis aut culpa vel sequi voluptates dolor quia perspiciatis! Autem, facilis. Iure sint quas commodi vel qui, incidunt eaque doloribus!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus id qui accusantium, ea error soluta eveniet quidem dicta velit saepe possimus enim sunt amet dolorum voluptates cumque reiciendis ab commodi, hic quibusdam blanditiis nam fugiat iure. Sit aut tenetur dolor impedit odit eos voluptates commodi? Eligendi veniam quam atque dolore dolorum! Expedita commodi eos voluptatum eligendi dolores delectus accusamus dolor quis inventore perspiciatis aperiam sint eius sequi sunt perferendis ex repudiandae, obcaecati ad soluta! Adipisci nihil sint consequuntur fugiat, consequatur nobis aut culpa vel sequi voluptates dolor quia perspiciatis! Autem, facilis. Iure sint quas commodi vel qui, incidunt eaque doloribus!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
