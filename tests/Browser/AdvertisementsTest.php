<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdvertisementsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group adv
     * @group testAddAdvertisements
     * @return void
     */
    public function testAddAdvertisements()
    {
        $this->browse(function ($browser) {
            $this->browse(function ($browser) {
                $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Thêm quảng cáo')
                        ->type('adv_company', 'Company 001')
                        ->attach('adv_url', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
                        ->radio('adv_position', 'content')
                        ->type('url_company', 'https://laravel.com')
                        ->type('expired_day', '13-04-2017')
                        ->press('Thêm mới')
                        ->assertSee('Thêm thành công !');
            });
        });
    }

    /**
     * testAddAdvertisementsFail
     * @group adv
     * @group testAddAdvertisementsFail
     * @return void
     */
    public function testAddAdvertisementsFail()
    {
        $this->browse(function ($browser) {
            $this->browse(function ($browser) {
                $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Thêm quảng cáo')
                        ->attach('adv_url', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
                        ->radio('adv_position', 'content')
                        ->type('url_company', 'https://laravel.com')
                        ->type('expired_day', '13-04-2017')
                        ->press('Thêm mới')
                        ->assertSee('Bạn không được bỏ trống trường này.');
            });
        });
    }

    /**
     * Update 
     * @group adv
     * @group testUpdateAdvertisements
     * @return void
     */
    public function testUpdateAdvertisements()
    {
        $this->browse(function ($browser) {
            $this->browse(function ($browser) {
                $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Danh sách quảng cáo')
                        ->clickLink('Sửa')
                        ->type('adv_company', 'Company 001')
                        ->attach('adv_url', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
                        ->type('url_company', 'https://laravel.com')
                        ->type('expired_day', '13-04-2017')
                        ->press('Cập nhật')
                        ->assertSee('Cập nhật thành công !');
            });
        });
    }

    /**
     * testUpdateAdvertisementsFail
     * @group adv
     * @group testUpdateAdvertisementsFail
     * @return void
     */
    public function testUpdateAdvertisementsFail()
    {
        $this->browse(function ($browser) {
            $this->browse(function ($browser) {
                $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Danh sách quảng cáo')
                        ->clickLink('Sửa')
                        ->type('adv_company', 'Company 001')
                        ->attach('adv_url', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
                        ->type('url_company', 'https://laravel.com')
                        ->type('expired_day', '13-04-2017')
                        ->press('Cập nhật')
                        ->assertSee('Cập nhật thành công !');
            });
        });
    }

    /**
     * Delete
     * @group adv
     * @group testDeleteAdvertisements
     * @return void
     */
    public function testDeleteAdvertisements()
    {
        $this->browse(function ($browser) {
            $this->browse(function ($browser) {
                $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Danh sách quảng cáo')
                        ->clickLink('Xóa')
                        ->press('Đồng Ý')
                        ->assertSee('Xóa thành công !');
            });
        });
    }
}
