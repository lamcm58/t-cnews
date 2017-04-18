<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoriesInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use App\Repositories\News\NewsRepositoriesInterface;
use App\Repositories\Comment\CommentRepositoriesInterface;
use App\Repositories\Advertisements\AdvertisementsRepositoryInterface;

class HomeController extends Controller
{

    protected $user;

    protected $category;

    protected $subCategory;

    protected $news;

    protected $comment;

    protected $adv;

    /**
     * Create a new controller instance
     *
     * @param UserRepositoriesInterface $user
     * @param CategoryRepositoryInterface $category
     * @param SubCategoryRepositoryInterface $subCategory
     * @param NewsRepositoriesInterface $news
     * @param CommentRepositoriesInterface $comment
     * @param AdvertisementsRepositoryInterface $adv
     */
    public function __construct(UserRepositoriesInterface $user, CategoryRepositoryInterface $category, SubCategoryRepositoryInterface $subCategory, NewsRepositoriesInterface $news, CommentRepositoriesInterface $comment, AdvertisementsRepositoryInterface $adv)
    {
        $this->user = $user;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->news = $news;
        $this->comment = $comment;
        $this->adv = $adv;
    }

    /**
     * Count all users, categories, sub categories, news, comments,
     * advertisements and show to admin homepage
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $countUser = $this->user->countUser();
        $countCategory = $this->category->countCategoty();
        $countSub = $this->subCategory->countSubCategory();
        $countNews = $this->news->countNews();
        $countComment = $this->comment->countComment();
        $countAdv = $this->adv->countAdvertisement();

        if (Auth::check()) {
            return view('admin.layout.index', [
                'countUser' => $countUser,
                'countCategory' => $countCategory,
                'countSub' => $countSub,
                'countNews' => $countNews,
                'countComment' => $countComment,
                'countAdv' => $countAdv
            ]);
        }
    }
}
