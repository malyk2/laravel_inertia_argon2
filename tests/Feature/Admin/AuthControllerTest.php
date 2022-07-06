<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class AuthControllerTest extends TestCase
{
    public function test_see_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertInertia(fn (Assert $page) => $page->component('Admin/Auth/Login'));
        $response->assertStatus(200);
    }
}
