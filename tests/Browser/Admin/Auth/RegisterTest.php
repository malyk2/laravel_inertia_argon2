<?php

namespace Tests\Browser\Auth\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\Register;
use Tests\Browser\Pages\Example\Dashboard;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_email_exists()
    {
        User::factory(['email' => 'exists@email.com'])->create();
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register())
                ->type('name', 'New user')
                ->type('email', 'exists@email.com')
                ->type('password', 'secret')
                ->press('Sign up')
                ->waitFor('div.invalid-feedback')
                ->assertSee('The email has already been taken.');
        });
    }

    public function test_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register())
                ->type('name', 'New user')
                ->type('email', 'newuser@email.com')
                ->type('password', 'secret')
                ->press('Sign up')
                ->waitForRoute('examples.dashboard')
                ->on(new Dashboard())
                ->assertSee('Logout');
        });
        $this->assertDatabaseHas('users', ['name' => 'New user', 'email' => 'newuser@email.com']);
    }
}
