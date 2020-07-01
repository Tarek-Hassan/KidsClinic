<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
 
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_view_articles()
    {
        $user= User::find(3);
        $response=$this->actingAs($user)->get('articles');
        $this->assertEquals(200, $response->status());
    }
    
    
    public function test_user_can_view_patientDetails()
    {   $user= User::find(3);
        
        $response=$this->actingAs($user)->get('invoice');
        $this->assertEquals(200, $response->status());
    }

    public function test_user_cannot_view_Dashboard()
    {   $user= User::find(3);
        
        $response=$this->actingAs($user)->get('admin');
        $this->assertNotEquals(200, $response->status());
    }

  
}
