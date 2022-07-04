<?php

namespace Tests\Browser\Auth;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            // $browser->visit(route('login'))
            $browser->visit('/admin/login')
                    ->assertSee('Sign In');
        });
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('http://app:80/')
        //             ->assertSee('Welcome');
        // });
    }
}
