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
        $user = factory(App\User::class)->create([
            'name' => 'Osvaldo',
            'email' => 'osvaldo@odig.net',
            'password' => '$2y$10$ZgjkabLJkjVyqwaCu85ePueIG218mbFGUrQdXuAglxy7.trjsMPpq', // piperun
        ]);

        foreach (range(3, 5) as $_) {
            factory(App\Atividade::class)->create([
                'user_id' => $user->id
            ]);
        }
    }
}