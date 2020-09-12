<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Article;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase
    /**
     * /laravel/clinic/database/database.sqlite
     * 
     *  php artisan make:test ArticleTest --unit
     *  vendor/bin/phpunit --filter ArticleTest
     *  php artisan test
     * 
     *  use RefreshDatabase
     */
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
    }

    public function test_article_Can_be_created_with_permission_admin()
    {
        $admin= User::find(1);
        // $this->withoutExceptionHandling();
        $response=$this->actingAs($admin)->post('/admin/articles',[
            'title'=>'articletitle',
            'body'=>'articlebody',
            'doctor_id'=>$admin->id
        ]);
        $this->assertEquals(302, $response->status());
    }



    // public function test_article_Can_be_created_with_permission_doctor()
    // {
    //     $doctor= User::find(2);
    //     // $this->withoutExceptionHandling();
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     $this->assertEquals(302, $response->status());
    // //     $this->assertRedirect("order.index");
    // }


    // public function test_article_Cannot_be_created_with_permission_user()
    // {
    //     $user= User::find(3);
    //     // $this->withoutExceptionHandling();
    //     $response=$this->actingAs($user)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$user->id
    //     ]);
    //     $this->assertEquals(302, $response->status());
    // }


    // public function test_article_title_canot_be_null()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>'',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     $response->assertSessionHasErrors('title');
       
    // }

    // public function test_article_title_canot_be_Ar()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>' العنوان',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     // $response->assertSessionHasErrors('title');  
    //     $this->assertTrue(true);
    // }


    // public function test_article_title_canot_be_En()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>' title',
    //         'body'=>'الموضوع',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     // $response->assertSessionHasErrors('title');  
    //     $this->assertTrue(true);
    // }


    // public function test_article_body_canot_be_null()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     $response->assertSessionHasErrors('body');
       
    // }


    // public function test_article_body_canot_be_Ar()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'الموضوع',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     // $response->assertSessionHasErrors('body');
    //     $this->assertTrue(true);
       
    // }

    // public function test_article_body_canot_be_En()
    // {
    //     $doctor= User::find(1);
    //     $response=$this->actingAs($doctor)->post('/admin/articles',[
    //         'title'=>'العنوان',
    //         'body'=>'bodyen',
    //         'doctor_id'=>$doctor->id
    //     ]);
    //     // $response->assertSessionHasErrors('body');
    //     $this->assertTrue(true);
       
    // }

    // public function test_article_Can_be_updated()
    // {
    //     $this->withoutExceptionHandling();
    //     $admin= User::find(1);

    //     $this->actingAs($admin)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$admin->id
    //     ]);
    //     $article=Article::first();
     

    //     $response=$this->actingAs($admin)->put("/admin/articles/$article->id",[
    //         'title'=>'updatedtitle',
    //         'body'=>'updatedbody'
    //     ]);

    //     $this->assertEquals(302, $response->status());
    // }


    // public function test_article_Can_be_deleted()
    // {
    //     $admin= User::find(1);
    //     $this->actingAs($admin)->post('/admin/articles',[
    //         'title'=>'articletitle',
    //         'body'=>'articlebody',
    //         'doctor_id'=>$admin->id
    //     ]);
    //     $art=Article::first();
       

    //     $this->withoutExceptionHandling();

    //     $response=$this->actingAs($admin)->delete("/admin/articles/$art->id");

    //     $article=Article::find($art->id);

    //     $this->assertEquals(302, $response->status());

    //     $this->assertEquals(null, $article);
    // }



}
