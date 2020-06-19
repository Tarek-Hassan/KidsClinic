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
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' =>'admin@admin.com',
        //     'password' => Hash::make('123456789'),
        //     'role' => '2',
        //     ]);
        //     DB::table('patients')->insert([
        //         'name'=>'patient1',
        //         'age'=>2,
        //         'blood_type'=>'0',
        //         'birth_type'=>'0',
        //         'number'=>'2',
                
        //         'dad_job'=>'accountant',
        //         'mum_job'=>'nurse',
        //         'phone'=>'01159210722',
        //         'address'=>'alexandria',
        //         'doctor_id'=>'1',
        //         ]);
        //         DB::table('visits')->insert([
        //             'temp'=>'36.2',
        //             'weight'=>'90.2',
        //             'length'=>'25.2',
        //             'head_circ'=>'25.2',
        //             'doctor_id'=>'1',
        //             'patient_id'=>'1',
        //             ]);
                DB::table('schedules')->insert([
                    'title'=>'sssssssssssss',
                    'start'=>now(),
                    'end'=>now(),
                   
                    ]);
                    // $this->call(UserSeeder::class);
                }
        }
        