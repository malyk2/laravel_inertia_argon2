<?php

namespace Tests\Browser\Admin\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\Login;
use Tests\Browser\Pages\Example\Dashboard;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_success()
    {
        $user = User::factory(['password' => bcrypt('some password')])->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login())
                ->assertSee('Sign In')
                ->type('email', $user->email)
                ->type('password', 'some password')
                ->press('Sign in')
                // ->pressAndWaitFor('Sign in', 10)
                ->waitForRoute('examples.dashboard')
                // ->pause(1000)
                // ->screenshot('test1')
                ->on(new Dashboard())
                ->assertSee('Logout');
        });
    }
}
