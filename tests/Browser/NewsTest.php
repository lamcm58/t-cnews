<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\News;

class NewsTest extends DuskTestCase
{
    /**
     * @group news
     * @group testVisitNewsPage
     * @return void
     */
    public function testVisitNewsPage()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết');
        });
    }

    /**
     * @group news
     * @group addNewsFail
     * @return void
     */
    public function testAddNewsWithNoInputs()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Thêm mới bài viết')
            ->assertSee('Thêm bài viết')
            ->press('Thêm')
            ->assertSee('Tiêu đề không được để trống')
            ->assertSee('Mô tả không được để trống')
            ->assertSee('Nội dung không được để trống')
            ->assertSee('Thể loại không được để trống')
            ->assertSee('Loại tin không được để trống')
            ->assertSee('Hình nhỏ không được để trống')
            ->assertSee('Hình ảnh không được để trống');
        });
    }

    /**
     * Test việc thêm mới tin tức thành công
     * để test được vui lòng bỏ editor 2 phần Mô tả và Nội dung ở file add.blade.php
     * trong thư mục admin\news trong views
     *
     * @group news
     * @group addNewsSuccess
     * @return void
     */
    public function testAddNewsSuccess()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Thêm mới bài viết')
            ->assertSee('Thêm bài viết')
            ->type('news_title', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...')
            ->type('news_description', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...')
            ->type('news_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
            ->select('category', '3')
            ->pause(8000)
            ->select('news_cate_id', '13')
            ->attach('news_image_thumbnail', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
            ->attach('news_images', 'C:\Users\ADMIN\Pictures\Feedback\anh\1.png')
            ->press('Thêm')
            ->assertSee('Thêm bài viết thành công.');
        });
    }

    /**
     * @group news
     * @group editNewsSuccess
     * @return void
     */
    public function testEditNewsSuccess()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết')
            ->clickLink('Sửa')
            ->assertSee('Sửa bài viết')
            ->check('news_is_hot')
            ->press('Lưu')
            ->assertSee('Sửa bài viết thành công.');
        });
    }

    /**
     * @group news
     * @group editNewsFail
     * @return void
     */
    public function testEditNewsFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết')
            ->clickLink('Sửa')
            ->assertSee('Sửa bài viết')
            ->type('news_title', '')
            ->press('Lưu')
            ->assertSee('Tiêu đề không được để trống');
        });
    }

    /**
     * @group news
     * @group viewNews
     * @return void
     */
    public function testViewNews()
    {
        $this->browse(function ($browser) {
            $news = News::find(3);

            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết')
            ->visit('http://t-cnews.cowell.com/admin/news/view/' . $news->news_slug)
            ->assertSee($news->news_title);
        });
    }

    /**
     * @group news
     * @group checkNews
     * @return void
     */
    public function testCheckNews()
    {
        $this->browse(function ($browser) {
            $news = News::where('news_is_check', '=', 0)->first();

            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết')
            ->visit('http://t-cnews.cowell.com/admin/news/view/' . $news->news_slug)
            ->assertSee($news->news_title)
            ->press('Duyệt')
            ->assertSee('Duyệt bài viết thành công.');
        });
    }

    /**
     * @group news
     * @group deleteNews
     * @return void
     */
    public function testDeleteNews()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bài viết')
            ->assertSee('Danh sách bài viết')
            ->press('Xóa')
            ->press('Có')
            ->assertSee('Xóa bài viết thành công.');
        });
    }
}
