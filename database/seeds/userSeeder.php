<?php

use Illuminate\Database\Seeder;
use App\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id ='1';
        $user->matricula = 'EXGS971124H1A';
        $user->name = 'Sergio Rafael Eb Gallegos';
        $user->email = 'sergio@admin.com';
        $user->password = '$2y$10$X1QXH.vTlkGrktzKnKB7wOJ2HjzUhWLRxi4ee94dnmf7bQmXmpJQO';
        $user->rol_id = '1';
        $user->save();
    }
}
