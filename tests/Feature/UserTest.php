<?php
namespace Tests\Feature;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function testGetUserData()
    {
        $this->json('get', $this->urlAuth.'me', [], $this->headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                ],
            ])
        ;
    }

    public function testLoginForm()
    {
        $response = $this->json('POST', $this->urlAuth.'login', [
            'email' => $this->userMail,
            'password' => $this->userPassword
        ],[
            'Authorization' => 'Bearer '.$this->token
        ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'access_token',
                    'token_type',
                    'expires_in',
                    'user',
                ],
            ])
        ;
    }

    public function testRegisterForm()
    {
        $response = $this->json('POST', $this->urlAuth.'register', [
            'name' => 'John Dow',
            'email' => 'newUser@test.com',
            'password' => '1234567'
        ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'access_token',
                    'token_type',
                    'expires_in',
                    'user',
                ],
            ])
        ;
    }
}