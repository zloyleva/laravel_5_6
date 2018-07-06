<?php
namespace Tests\Feature;
use Tests\TestCase;

class HttpTest extends TestCase
{
    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testLogoutPage()
    {
        $response = $this->get('/logout');
        $response->assertStatus(200);
    }
}