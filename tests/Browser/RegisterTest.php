<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register')
                ->value('#email','axsakhkakaayz@admin.com')
                ->value('#password','123456')
                ->value('#password-confirm','123456')
                ->select('role', 'Admin');
/*                ->press('Register')
                ->assertTitle('Laravel')
            ->assertPathIs('/home'); */
        });
    }
    }

