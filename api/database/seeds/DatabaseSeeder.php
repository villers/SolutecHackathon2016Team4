<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('users')->delete();
        $users = array(
            ['first_name' => 'Ryan', 'last_name' => 'Chenkie', 'login' => 'rchenkie', 'email' => 'ryanchenkie@gmail.com', 'password' => Hash::make('secret'), 'country' => 'france', 'city' => 'lyon', 'postal_code' => '69003', 'address_number' =>'256', 'address' => 'rue paul bert', 'type' => 'candidate', 'points' => 0, 'is_active' => 1, 'token_active' => 0],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
        Model::reguard();

    }
}
