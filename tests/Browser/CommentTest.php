<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\Comment;

class CommentTest extends DuskTestCase
{
    /**
     * @group comment
     * @return void
     */
    public function testVisitPage()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bình luận')
            ->assertSee('Danh sách bình luận');
        });
    }

    /**
     * @group comment
     * @group checkComment
     * @return void
     */
    public function testCheckComment()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bình luận')
            ->press('Chưa duyệt')
            ->assertSee('Duyệt bình luận')
            ->press('Duyệt')
            ->assertSee('Duyệt bình luận thành công.');
        });
    }

    /**
     * @group comment
     * @group deleteComment
     * @return void
     */
    public function testDeleteComment()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/logout')
            ->type('email', 'admin@admin.com')
            ->type('password', 'matkhau123')
            ->press('Đăng nhập')
            ->clickLink('Danh sách bình luận')
            ->press('Xóa')
            ->assertSee('Bạn có chắc muốn xóa bình luận này?')
            ->press('Có')
            ->assertSee('Xóa bình luận thành công.');
        });
    }

    /**
     * @group comment
     * @group commentNews
     * @return void
     */
    public function testCommentNews()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://t-cnews.cowell.com/')
            ->visit('http://t-cnews.cowell.com/news/is-khieu-khich-tong-thong-trump-HZxlvLHeAO')
            ->type('comment_name', 'Thucnv')
            ->type('comment_content', 'Bài viết thứ rất hay')
            ->press('Gửi')
            ->assertSee('Bài viết thứ rất hay');
        });
    }
}
