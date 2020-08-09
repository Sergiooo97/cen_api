<?php

use Illuminate\Database\Seeder;
use App\role_user;
class user_rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new role_user();
        $user->role_id = '1';
        $user->user_id = '1';
        $user->save();
    }
}
