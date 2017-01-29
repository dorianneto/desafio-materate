<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add default user
        $User = new User;
        $User->name = "Default";
        $User->email = "admin@admin.com.br";
        $User->password = bcrypt('admin');
        $User->remember_token = str_random(10);
        $User->save();

        // Add random users
        factory(App\User::class, 3)->create();
    }
}
