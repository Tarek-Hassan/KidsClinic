<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AdminTest extends TestCase
{
  private $admin;
    /**
     * A basic unit test example.
     *
     * @return void
     */




    public function test_Admin_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_Admin_can_view_Dashboard()
    {      
        $admin= User::find(1);
        $response=$this->actingAs($admin)->get('/admin');
        $this->assertEquals(200, $response->status());
    }



    public function test_Admin_can_Create_Doctor()
    {   
        $doctor= User::find(1);
        $response = $this->actingAs($doctor)->post( "/admin/users",
         [
            'name' => 'test doctorName',
            'email' =>'doctortest@doctor.com',
            'password' => '123456789',          
            'role' => '1',
             ]
        );
        // 302 mean it sucess and redirect
        $this->assertEquals(302, $response->status());
    }

    public function test_Admin_can_view_about()
    {      $admin= User::find(1);
        $response=$this->actingAs($admin)->get('/admin/about');
        $this->assertEquals(200, $response->status());
    }

    public function test_Admin_can_view_setting()
    {      $admin= User::find(1);
        $response=$this->actingAs($admin)->get('/admin/setting');
        $this->assertEquals(200, $response->status());
    }
    




  
}
