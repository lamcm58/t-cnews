<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group category
     * @group testAddCategory
     * @return void
     */
    public function testAddCategory()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Thêm mới thể loại')
                    ->type('category_name', 'Category test 1')
                    ->press('Thêm mới')
                    ->assertSee('Thêm mới thành công !');
        });
    }

    /**
     * testAddCategoryFail
     * @group category
     * @group testAddCategoryFail
     * @return [type] [description]
     */
    public function testAddCategoryFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Thêm mới thể loại')
                    ->press('Thêm mới')
                    ->assertSee('Bạn không được bỏ trống trường này.');
        });
    }

    /**
     * Test Edit category
     * @group category
     * @group testEditCategory
     * @return void
     */
    public function testEditCategory()
    {   
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Danh sách thể loại')
                        ->click('#delete-cate')
                        ->type('category_name', 'Test Category 1')
                        ->press('Thay đổi')
                        ->assertSee('Cập nhật thành công !');
        });
    }

    /**
     * test edit fail
     * @group category
     * @group testEditCategoryFail
     * @return void
     */
    public function testEditCategoryFail()
    {   
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                        ->type('email', 'admin@admin.com')
                        ->type('password', 'matkhau123')
                        ->press('Đăng nhập')
                        ->clickLink('Danh sách thể loại')
                        ->click('#delete-cate')
                        ->press('Thay đổi')
                        ->assertSee('Tên thể loại đã tồn tại.');
        });
    }

    /**
     * Test delete category
     * @group category
     * @group testDeleteCategory
     * @return void
     */
    public function testDeleteCategory()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'matkhau123')
                    ->press('Đăng nhập')
                    ->clickLink('Danh sách thể loại')
                    ->press('Xóa')
                    ->press('Đồng Ý')
                    ->assertSee('Xóa thành công !');
        });
    }
}
