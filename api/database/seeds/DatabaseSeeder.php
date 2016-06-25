<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Model::unguard();
        DB::table('users')->delete();
        $users = array(
            ['name' => 'Ryan Chenkie', 'email' => 'ryanchenkie@gmail.com', 'password' => Hash::make('secret')],
            ['name' => 'Chris Sevilleja', 'email' => 'chris@scotch.io', 'password' => Hash::make('secret')],
            ['name' => 'Holly Lloyd', 'email' => 'holly@scotch.io', 'password' => Hash::make('secret')],
            ['name' => 'Adnan Kukic', 'email' => 'adnan@scotch.io', 'password' => Hash::make('secret')],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
        Model::reguard();
*/

        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 2; $i++) {
            DB::table('users')->insert([
                'type' => $faker->randomElement($array = array ('candidate','recruiter')),
                'points' => $faker->numberBetween($min = 0, $max = 9000),
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName($gender = null|'male'|'female'),
                'login' => $faker->word,
                'email' => $faker->email,
                'password' => bcrypt('azerty'),
                'country' => 'France',
                'city' => $faker->city,
                'postal_code' => $faker->postcode,
                'address_number' => $faker->buildingNumber,
                'address' => trim(preg_replace('/[0-9]|,+/', '', $faker->streetAddress)),
                'is_active' => $faker->randomElement($array = array (0, 1)),
                'token_active' => bin2hex(random_bytes(20)),
                'created_at' => date('Y-m-d h:m:s'),
                'lang'=> 'fr',
                'can_drive'=> $faker->randomElement($array = array (0, 1)),
            ]);
        }


/*

        DB::table('jobs')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'country' => 'France',
            'city' => 'Lyon',
            'postal_code' => '69000',
            'entreprise_desc' => 'Epitech, école informatique',
            'message' => "Afin d'encadrer une classe de développeurs web, nous recherchons un développeur confirmé en tant que responsable pédagogique",
            'lang' => 'fr',
            'graduation' => 'Bac +2',
            'salary' => '3000.35',
            'created_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'informatique',
            'created_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('notifications')->insert([
            'user_id' => 1,
            'has_read' => 0,
            'message' => 'Un recruteur a visité votre profil',
            'created_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('achievements_list')->insert([
            'user_id' => 1,
            'achievements_id' => 1,
            'has_read' => 0,
            'created_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('achievements')->insert([
            'message' => 'Félicitations vous avez accompli le haut fait "Super recruteur !"',
            'points' => 100,
            'icon' => '3D_rotation',
            'created_at' => date('Y-m-d h:m:s'),
        ]);
*/
    }
}
