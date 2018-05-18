<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = "Hilal";
        $user->last_name = "Najem";
        $user->date_of_birth = NULL;
        $user->blood_type = NULL;
        $user->email = "hilal123work@gmail.com";
        $user->password = bcrypt('hilal123');
        $user->token = "";
        $user->admin = 1;
        $user->confirmed = 1;
        $user->save();
    }
}
