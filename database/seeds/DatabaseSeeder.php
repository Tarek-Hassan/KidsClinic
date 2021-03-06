<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker )
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'password' => Hash::make('123456789'),
            'avatar'=>"images/logo2.png",
            'mobile'=>$faker->e164PhoneNumber,
            'national_id'=>$faker->isbn10,
            'role' => '2',
            ]);
        DB::table('users')->insert([
            'name' => 'doctor',
            'email' =>'doctor@doctor.com',
            'password' => Hash::make('123456789'),
            'mobile'=>$faker->e164PhoneNumber,
            'national_id'=>$faker->isbn10,
            'role' => '1',
            ]);
        DB::table('users')->insert([
                'name' => 'user',
                'email' =>'user@user.com',
                'password' => Hash::make('123456789'),
                'avatar'=>"images/logo5.png",
                'mobile'=>$faker->e164PhoneNumber,
                'national_id'=>$faker->isbn10,
                'patient_id'=>1,
                'role' => '0',
                ]);
            
            $About = factory(App\About::class)->create();
            $Setting = factory(App\Setting::class)->create();
            $Schedule =factory(App\Schedule::class,20)->create();

        $users = factory(App\User::class, 5)->create();
        $Article = factory(App\Article::class,40)->create();
        $Patient = factory(App\Patient::class,20)->create();
        $Visit = factory(App\Visit::class,50)->create();
        $appointment = factory(App\Appointment::class,10)->create();
        $chat=factory(App\Chat::class,10)->create();
                }
        }
        
