<?php

namespace Tests\Unit;
use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class DoctorTest extends TestCase
{
  private $doctor;
  private $patient;
  private $faker;
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function test_Doctor_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }


    public function test_Doctor_can_view_Dashboard()
    {      
        $doctor= User::find(2);
        $response=$this->actingAs($doctor)->get('/admin');
        $this->assertEquals(200, $response->status());
    }

    
    public function test_Doctor_can_create_Visit()
    {   
        $doctor= User::find(2);
        $response = $this->actingAs($doctor)->post( "/admin/1/visits",
         [
            'temp'=> rand(0, 100) / 10,
            'weight'=> rand(0, 100) / 10,
            'length'=> rand(0, 100) / 10,
            'head_circ'=> rand(0, 100) / 10,
            'notes'=>'test note',
            'patient_id'=>1,
            'doctor_id'=> 2,
             ]
        );
        // 302 mean it sucess and redirect
        $this->assertEquals(302, $response->status());
    }

    public function test_Doctor_can_create_patient()
    {   
        $doctor= User::find(2);
        $response = $this->actingAs($doctor)->post( "/admin/patients",
         [
            'name'=>'testPatientName',
            'age'=>3,
            'blood_type'=>3,
            'birth_type'=>1,
            'number'=>5,
            'dad_job'=>'testPatient dad job',
            'mum_job'=>'testPatient mum job',
            'phone'=>'012589635',
            'address'=>'testPatient Address',
            'notes'=>'testPatient NOtes',
            'doctor_id'=>2,
             ]
        );
        // 302 mean it sucess and redirect
        $this->assertEquals(302, $response->status());
    }

    public function test_Doctor_can_create_Email_TO_patient()
    {   
        $doctor= User::find(2);
        $response = $this->actingAs($doctor)->post( "/admin/users",
         [
            'name' => 'Patient Email',
            'email' =>'patient@patient.com',
            'password' =>'123456789',
            'patient_id'=>1,
            'role' => '0',

             ]
        );
        // 302 mean it sucess and redirect
        $this->assertEquals(302, $response->status());
    }

    public function test_Doctor_cannot_view_SettingPage_Dashboard()
    {           
        $doctor= User::find(2);    
        $response=$this->actingAs($doctor)->get('/admin/setting');
        $this->assertEquals(200, $response->status());
    }

    public function test_Doctor_cannot_view_AboutPage_Dashboard()
    {   
        $doctor= User::find(2);        
        $response=$this->actingAs($doctor)->get('/admin/about');
        $this->assertEquals(200, $response->status());
    }

  
}
