<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_see_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertInertia(fn (Assert $page) => $page->component('Admin/Auth/Login'));
        $response->assertStatus(200);
    }

    public function test_see_register_page()
    {
        $response = $this->get(route('register.form'));

        $response->assertInertia(fn (Assert $page) => $page->component('Admin/Auth/Register'));
        $response->assertStatus(200);
    }

    public function test_login_success()
    {
        $user = User::factory()->create(['password' => bcrypt('some password')]);
        $response = $this->post(route('login.submit'), ['email' => $user->email, 'password' => 'some password']);
        $response->assertRedirect(route('examples.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_logout_success()
    {
        /** @var User */
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_register_success()
    {
        $response = $this->post(route('register.submit'), ['name' => 'admin', 'email' => 'admin@email.com', 'password' => 'secret']);
        $response->assertRedirect(route('examples.dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['name' => 'admin', 'email' => 'admin@email.com']);
    }
}
