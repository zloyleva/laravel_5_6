<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestTest extends TestCase
{
    public function testLoginForm()
    {
        $response = $this->json('POST', $this->urlAuth.'login');
        $response->assertStatus(401);
    }

    public function testRegisterForm()
    {
        $response = $this->json('POST', $this->urlAuth.'register');
        $response->assertStatus(422);
    }
}
