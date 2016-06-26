<?php

use Carbon\Carbon;
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
        //Change this value to change the number of users generated
        $nb_users = 20;

        //This array contains a list of all graduations, change it as you want
        $graduations = array(
            'débutant',
            'Bac',
            'Bac+1',
            'Bac+2',
            'Bac+3',
            'Bac+4',
            'Bac+5',
            'CAP',
            'BEP'
        );

        //This array contains all categories of jobs, change it as you want
        $categories = array(
            "AGRICULTURE ET PÊCHE, ESPACES NATURELS ET ESPACES VERTS, SOINS AUX ANIMAUX",
            "ARTS ET FACONNAGE D'OUVRAGES D'ART",
            "BANQUE, ASSURANCE, IMMOBILIER",
            "COMMERCE, VENTE ET GRANDE DISTRIBUTION",
            "COMMUNICATION, MEDIA ET MULTIMEDIA",
            "CONSTRUCTION, BÂTIMENT ET TRAVAUX PUBLICS",
            "HÔTELLERIE- RESTAURATION TOURISME LOISIRS ET ANIMATION",
            "INDUSTRIE",
            "INSTALLATION ET MAINTENANCE",
            "SANTE",
            "SERVICES A LA PERSONNE ET A LA COLLECTIVITE",
            "SPECTACLE",
            "SUPPORT A L'ENTREPRISE",
            "TRANSPORT ET LOGISTIQUE"
        );

        //This array contains all achievements of jobs, change it as you want
        $achievements = array(
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Recruteur novice !" (Consulter 50 CV)  Bonus: 10 points', 'points' => 10, 'icon' => 'icon_name', 'type' => 1],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Recruteur avancé !" (Consulter 100 CV)  Bonus: 20 points', 'points' => 20, 'icon' => 'icon_name', 'type' => 2],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Recruteur expert !" (Consulter 200 CV)  Bonus: 30 points', 'points' => 30, 'icon' => 'icon_name', 'type' => 3],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Correcteur novice !" (Corriger 10 CV) Bonus: 10 points', 'points' => 10, 'icon' => 'icon_name', 'type' => 1],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Correcteur avancé !" (Corriger 20 CV) Bonus: 20 points', 'points' => 20, 'icon' => 'icon_name', 'type' => 2],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Correcteur expert !" (Corriger 50 CV) Bonus: 30 points', 'points' => 30, 'icon' => 'icon_name', 'type' => 3],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Membre Premium novice !" (Acheter 5 fois le status Premium) Bonus: 10 points', 'points' => 10, 'icon' => 'icon_name', 'type' => 1],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Membre Premium avancé !" (Acheter 10 fois le status Premium) Bonus: 20 points', 'points' => 20, 'icon' => 'icon_name', 'type' => 2],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Membre Premium expert !" (Acheter 20 fois le status Premium) Bonus: 30 points', 'points' => 30, 'icon' => 'icon_name', 'type' => 3],
            ['message' => 'Félicitations ! Vous avez reçu le trophée "Nouveau membre !" (Créer un compte) Bonus: 10 points', 'points' => 10, 'icon' => 'icon_name', 'type' => 1],
        );

        $faker = Faker::create('fr_FR');

        // Static user for test

        /*
        DB::table('users')->insert([
            'type' => $faker->randomElement($array = array('candidate', 'recruiter')),
            'points' => $faker->numberBetween($min = 0, $max = 9000),
            'last_name' => 'titi',
            'first_name' => 'titi',
            'login' => 'titi',
            'email' => 'titi@titi.fr',
            'password' => bcrypt('titi'),
            'country' => 'France',
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'address_number' => $faker->buildingNumber,
            'address' => trim(preg_replace('/[0-9]|,+/', '', $faker->streetAddress)),
            'is_active' => 1,
            'token_active' => bin2hex(random_bytes(20)),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'graduation' => $faker->randomElement($graduations),
            'lang' => 'fr',
            'can_drive' => $faker->randomElement($array = array(0, 1)),
            'picture' => 'avatar.png',
            'cv' => 'cv.pdf',
        ]);
       */

        //Seed for users
        for ($i = 0; $i < $nb_users; $i++) {
            $login = $faker->word;
            $email = $faker->email;

            $all_users = DB::table('users')->select('login', 'email')->get();
            $all_login = [];
            $all_email = [];
            for ($i = 0; $i < count($all_users); $i++) {
                $all_login[$i] = $all_users[$i]->login;
                $all_email[$i] = $all_users[$i]->email;
            }
            while (in_array($login, $all_login)) {
                $login = $faker->word;
            }
            while (in_array($email, $all_email)) {
                $email = $faker->word;
            }

            DB::table('users')->insert([
                'points' => $faker->numberBetween($min = 0, $max = 500),
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName($gender = null | 'male' | 'female'),
                'login' => $login,
                'email' => $email,
                'password' => bcrypt('azerty'),
                'country' => 'France',
                'city' => $faker->city,
                'postal_code' => $faker->postcode,
                'address_number' => $faker->buildingNumber,
                'address' => trim(preg_replace('/[0-9]|,+/', '', $faker->streetAddress)),
                'is_active' => $faker->randomElement($array = array(0, 1)),
                'token_active' => bin2hex(random_bytes(20)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'graduation' => $faker->randomElement($graduations),
                'lang' => 'fr',
                'can_drive' => $faker->randomElement($array = array(0, 1)),
                'phone_number' => $faker->phoneNumber,
                'picture' => 'avatar.png',
                'cv' => 'cv.pdf',
            ]);
        }

        //Seed for categories
        foreach ($categories as $v) {
            DB::table('categories')->insert([
                'name' => $v,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Seed for achievements
        foreach ($achievements as $v) {
            DB::table('achievements')->insert([
                'message' => $v["message"],
                'points' => $v["points"],
                'icon' => $v["icon"],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'type' => $v["type"],
            ]);
        }

        $user = User::findOrFail(1);
        $user->achievements()->attach(1);
        $user->achievements()->attach(2);
    }
}
