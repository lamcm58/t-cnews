<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     * @group LoginTest
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->assertSee('Tổng số người viết');
        });
    }

    /**
     * Test login fail
     * @group login
     * @group LoginTestFail
     * @return void
     */
    public function testLoginFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'test1@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->assertSee('Thông tin đăng nhập không hợp lệ, vui lòng đăng nhập lại.');
        });
    }
}
