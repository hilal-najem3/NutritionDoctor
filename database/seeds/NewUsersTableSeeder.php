<?php

use App\User;
use Illuminate\Database\Seeder;

class NewUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'first_name' => "Ahmad",
                'last_name' => "Ali",
                'date_of_birth' => NULL,
                'blood_type' => NULL,
                'email' => "ahmad123work@gmail.com",
                'password' => bcrypt('ahmad123'),
                'token' => "",
                'admin' => 0,
                'confirmed' => 1,
            ),
        );
        for ($i=0; $i < count($users); $i++) { 
            $newUser = new User();
            $newUser->first_name = $users[$i]['first_name'];
            $newUser->last_name = $users[$i]['last_name'];
            $newUser->date_of_birth = $users[$i]['date_of_birth'];
            $newUser->blood_type = $users[$i]['blood_type'];
            $newUser->email = $users[$i]['email'];
            $newUser->password = $users[$i]['password'];
            $newUser->token = $users[$i]['token'];
            $newUser->admin = $users[$i]['admin'];
            $newUser->confirmed = $users[$i]['confirmed'];
            $newUser->save();
        }
    }
}
