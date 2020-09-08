<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = factory(App\User::class)->create([
            'name' => 'Osvaldo',
            'email' => 'osvaldo@odig.net',
            'password' => '$2y$10$ZgjkabLJkjVyqwaCu85ePueIG218mbFGUrQdXuAglxy7.trjsMPpq', // piperun
        ]);

        factory(App\Atividade::class, 10)->create([
            'user_id' => $user1->id
        ]);

        $user2 = factory(App\User::class)->create([
            'name' => 'Gustavo',
            'email' => 'gustavonovaes.dev@gmail.com',
            'password' => '$2y$10$ZgjkabLJkjVyqwaCu85ePueIG218mbFGUrQdXuAglxy7.trjsMPpq', // piperun
        ]);

        factory(App\Atividade::class, 10)->create([
            'user_id' => $user2->id
        ]);
    }
}