<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();


    }

    public function test_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitForText('Password')
                ->assertSee('Password');
        });
    }
}
