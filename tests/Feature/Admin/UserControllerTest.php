<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_see_index_page()
    {
        /** @var User */
        $admin = User::factory()->create();
        $users = User::factory()->count(2)->create();
        $response = $this->actingAs($admin)->get(route('users.index'));

        $response->assertInertia(function (Assert $page) use ($users) {
            $page->component('Admin/Users/Index')
                ->has('users.data', 2)
                ->has('users.data', function (Assert $page) use ($users) {
                    foreach ($users->reverse() as $user) {
                        $page->whereContains('id', $user->id);
                        $page->whereContains('name', $user->name);
                        $page->whereContains('email', $user->email);
                    }
                    $page->etc();
                });
        });
        $response->assertStatus(200);
    }

    public function test_see_create_page()
    {
        /** @var User */
        $admin = User::factory()->create();
        $response = $this->actingAs($admin)->get(route('users.create.form'));

        $response->assertInertia(
            fn (Assert $page) =>
            $page->component('Admin/Users/Form')
                ->has('user', null)
        );
        $response->assertStatus(200);
    }

    public function test_see_edit_page()
    {
        /** @var User */
        $admin = User::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('users.show', ['user' => $user->id]));

        $response->assertInertia(
            fn (Assert $page) =>
            $page->component('Admin/Users/Form')
                ->has(
                    'user',
                    fn (Assert $page) =>
                    $page->where('id', $user->id)
                        ->where('name', $user->name)
                        ->where('email', $user->email)
                        ->etc()
                )
        );
        $response->assertStatus(200);
    }

    public function test_create_user_success()
    {
        /** @var User */
        $admin = User::factory()->create();
        $data = [
            'name' => 'Some new user',
            'email' => 'newuser@email.com',
            'password' => 'some password',
        ];

        $response = $this->actingAs($admin)->post(route('users.create'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['name' => $data['name'], 'email' => $data['email']]);
    }

    public function test_edit_user_success()
    {
        /** @var User */
        $admin = User::factory()->create();
        $user = User::factory()->create();
        $data = [
            'name' => 'Some new user',
            'email' => 'newuser@email.com',
        ];

        $response = $this->actingAs($admin)->put(route('users.update', ['user' => $user->id]), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => $data['name'], 'email' => $data['email'], 'password' => $user->password]);
    }
}
