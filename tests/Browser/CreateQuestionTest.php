<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateQuestionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'bani@admin.com')
                ->type('password', '123456')
                ->press( 'Login')
                ->assertPathIs('/home');

            $browser->visit('/questions/create')
                ->type('body', '123456')
                    ->press('Save')
            ->assertPathIs('/home');

        });
    }
}
