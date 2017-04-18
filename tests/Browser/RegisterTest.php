<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     * @group visitRegister
     * @return void
     */
    public function testVisitPage()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->clickLink('Đăng ký ngay')
                    ->assertSee('Đăng ký');
        });
    }

    /**
     * @group register
     * @group testRegisterWithEmptyInputs
     */
    public function testRegisterWithEmptyInputs()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->clickLink('Đăng ký ngay')
            ->assertSee('Đăng ký')
            ->press('Đăng ký')
            ->assertSee('Trường username không được bỏ trống.')
            ->assertSee('Trường email không được bỏ trống.')
            ->assertSee('Trường password không được bỏ trống.')
            ->assertSee('Trường phone không được bỏ trống.')
            ->assertSee('Trường birthday không được bỏ trống.');
        });
    }

    /**
     * @group register
     * @group registerSuccess
     */
    public function testRegisterSuccess()
    {
        $user = User::where('email', '=', 'admin@gmail.com')->first();
        if (!empty($user))
        {
            $user->delete();
        }

        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->clickLink('Đăng ký ngay')
            ->assertSee('Đăng ký')
            ->type('username', 'lamcm58')
            ->type('email', 'admin@gmail.com')
            ->type('password', 'admin123')
            ->type('password_confirmation', 'admin123')
            ->type('phone', '0988765432')
            ->type('birthday', '01-01-2000')
            ->press('Đăng ký')
            ->assertSee('Đăng ký thành công, vui lòng đăng nhập.');
        });
    }

    /**
     * @group register
     * @group testRegisterWithExisEmail
     */
    public function testRegisterWithExisEmail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->clickLink('Đăng ký ngay')
            ->assertSee('Đăng ký')
            ->type('username', 'lamcm_58')
            ->type('email', 'admin@gmail.com')
            ->type('password', 'admin123')
            ->type('password_confirmation', 'admin123')
            ->type('phone', '0987654321')
            ->type('birthday', '01-01-2000')
            ->press('Đăng ký')
            ->assertSee('Trường email đã có trong cơ sở dữ liệu.');
        });
    }

    /**
     * @group register
     * @group testRegisterPasswordNotLongEnough
     */
    public function testRegisterPasswordNotLongEnough()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->clickLink('Đăng ký ngay')
            ->assertSee('Đăng ký')
            ->type('username', 'lamcm_58')
            ->type('email', 'admin@gmail.com')
            ->type('password', 'admin')
            ->type('password_confirmation', 'admin123')
            ->type('phone', '0987654321')
            ->type('birthday', '01-01-2000')
            ->press('Đăng ký')
            ->assertSee('Trường email đã có trong cơ sở dữ liệu.')
            ->assertSee('Trường password phải có tối thiểu 6 ký tự.');
        });
    }

    /**
     * @group register
     * @group testRegisterPasswordNotMatch
     */
    public function testRegisterPasswordNotMatch()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->clickLink('Đăng ký ngay')
            ->assertSee('Đăng ký')
            ->type('username', 'lamcm_58')
            ->type('email', 'admin@gmail.com')
            ->type('password', 'admin12')
            ->type('password_confirmation', 'admin123')
            ->type('phone', '0987654321')
            ->type('birthday', '01-01-2000')
            ->press('Đăng ký')
            ->assertSee('Trường email đã có trong cơ sở dữ liệu.')
            ->assertSee('Giá trị xác nhận trong trường password không khớp.');
        });
    }
}
