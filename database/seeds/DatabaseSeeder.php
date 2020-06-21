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
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'password' => Hash::make('123456789'),
            'role' => '2',
            ]);
            $users = factory(App\User::class, 5)->create();
            $Patient = factory(App\Patient::class,10)->create();
            $Visit = factory(App\Visit::class,50)->create();
            $Schedule = factory(App\Schedule::class,40)->create();
                }
        }
        