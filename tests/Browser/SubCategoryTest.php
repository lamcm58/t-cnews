<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group subCategory
     * @group testAddSubCategory
     * @return void
     */
    public function testAddSubCategory()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Thêm mới loại tin')
                    ->type('sub_category_name', 'Test SubCategory 1')
                    ->press('Thêm mới')
                    ->assertSee('Thêm mới thành công !');
        });
    }

    /**
     * testAddSubCategoryFail
     * @group subCategory
     * @group testAddSubCategoryFail
     * @return void
     */
    public function testAddSubCategoryFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Thêm mới loại tin')
                    ->press('Thêm mới')
                    ->assertSee('Bạn không được bỏ trống trường này.');
        });
    }

    /**
     * Test edit subCategory
     * @group subCategory
     * @group testEditSubCategory
     * @return void
     */
    public function testEditSubCategory()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Danh sách loại tin')
                    ->click('#delete-cate')
                    ->type('sub_category_name', 'Test SubCategory 2')
                    ->press('Cập nhật')
                    ->assertSee('Cập nhật thành công !');
        });
    }

    /**
     * testEditSubCategoryFail
     * @group subCategory
     * @group testEditSubCategoryFail
     * @return void
     */
    public function testEditSubCategoryFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Danh sách loại tin')
                    ->click('#delete-cate')
                    ->press('Cập nhật')
                    ->assertSee('Tên loại tin đã tồn tại.');
        });
    }

    /**
     * Test Delete Category
     * @group subCategory
     * @group testDeleteSubCategory
     * @return void
     */
    public function testDeleteSubCategory()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Danh sách loại tin')
                    ->press('Xóa')
                    ->press('Đồng Ý')
                    ->assertSee('Xóa thành công !');
        });
    }
}
