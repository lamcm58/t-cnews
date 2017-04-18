<?php

namespace App\Repositories\News;

use App\Models\News;
use Illuminate\Support\Str;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class NewsRepositories extends EloquentRepository implements NewsRepositoriesInterface
{
    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return \App\Models\News::class;
    }

    /**
     * Find news by slug
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::findBySlug()
     */
    public function findBySlug($slug)
    {
        $result = $this->_model->where('news_slug', '=', $slug)->first();

        return $result;
    }

    /**
     * Get news of users
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getNewsByUser()
     */
    public function getNewsByUser($id)
    {
        $result = $this->_model->where('news_user_id', '=', $id)->get();

        return $result;
    }

    /**
     * Create news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::createNews()
     */
    public function createNews($request = [])
    {
        $data = [];

        $data['news_cate_id'] = $request['news_cate_id'];
        $data['news_user_id'] = $request['user_id'];
        $data['news_title'] = $request['news_title'];
        $data['news_slug'] = Str::slug($request['news_title']) . '-' . str_random(10);
        $data['news_description'] = $request['news_description'];
        $data['news_content'] = $request['news_content'];
        $data['news_view'] = 0;
        $data['news_is_hot'] = $request['news_is_hot'] == "on" ? 1 : 0;
        $data['news_is_check'] = 0;
        $data['news_is_public'] = 0;

        $photo = str_random(10). $request->file('news_image_thumbnail')->getClientOriginalName();
        $data['news_image_thumbnail'] = $photo;
        $request->file('news_image_thumbnail')->move('image/imageThumbnail', $photo);

        $image = str_random(10). $request->file('news_images')->getClientOriginalName();
        $data['news_images'] = $image;
        $request->file('news_images')->move('image/images', $image);

        $this->_model->create($data);
    }

    /**
     * Delete news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::destroyNews()
     */
    public function destroyNews($id)
    {
        $this->_model->destroy($id);
    }

    /**
     * Edit news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::editNews()
     */
    public function editNews($id, $request = [])
    {
        $news = $this->_model->find($id);
        $data = [];

        $data['news_title'] = $request['news_title'];
        $data['news_slug'] = Str::slug($request['news_title']) . '-' . str_random(10);
        $data['news_description'] = $request['news_description'];
        $data['news_content'] = $request['news_content'];
        $data['news_is_hot'] = $request['news_is_hot'] == "on" ? 1 : 0;
        $data['news_is_check'] = 0;

        if (!empty($request->file('news_image_thumbnail')))
        {
            $photo = str_random(10). $request->file('news_image_thumbnail')->getClientOriginalName();
            $data['news_image_thumbnail'] = $photo;
            $request->file('news_image_thumbnail')->move('image/imageThumbnail', $photo);
        } else {
            $data['news_image_thumbnail'] = $news->news_image_thumbnail;
        }

        if (!empty($request->file('news_images')))
        {
            $image = str_random(10). $request->file('news_images')->getClientOriginalName();
            $data['news_images'] = $image;
            $request->file('news_images')->move('image/images', $image);
        } else {
            $data['news_images'] = $news->news_images;
        }

        $news->update($data);
    }

    /**
     * Check news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::checkNews()
     */
    public function checkNews($id)
    {
        $news = $this->_model->find($id);
        $news->news_is_check = 1;
        $news->save();
    }

    /**
     * Get hot news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getNewsHot()
     */
    public function getNewsHot($offset, $limit)
    {
        $news = $this->_model->where('news_is_check', '1')
                            ->where('news_is_hot', '1')
                            ->orderBy('id', 'desc')
                            ->offset($offset)
                            ->limit($limit)
                            ->get();

        return $news;
    }

    /**
     * Get one hot news
     *
     * @param integer $offset
     * @param integer $limit
     * @return mixed
     */
    public function getOneNewsHot($offset, $limit)
    {
        $news = $this->_model->where('news_is_check', '1')
                            ->where('news_is_hot', '1')
                            ->orderBy('id', 'desc')
                            ->offset($offset)
                            ->limit($limit)
                            ->first();

        return $news;
    }

    /**
     * Get checked news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getNewsCheck()
     */
    public function getNewsCheck($offset, $limit)
    {
        $news = $this->_model->where('news_is_check', '1')
                            ->orderBy('id', 'desc')
                            ->offset($offset)
                            ->limit($limit)
                            ->get();

        return $news;
    }

    /**
     * Get all related news of current news
     *
     * @param integer $id
     * @param integer $offset
     * @param integer $limit
     * @return mixed
     */
    public function getRelatedNews($id, $offset, $limit)
    {
        $news = $this->_model->where('news_cate_id', $id)
                            ->where('news_is_check', '1')
                            ->orderBy('id', 'desc')
                            ->offset($offset)
                            ->limit($limit)
                            ->get();

        return $news;
    }

    /**
     * Get all news of categories
     *
     * @param integer $cateId
     * @param integer $offset
     * @param integer $limit
     * @return mixed
     */
    public function getNewsCategory($cateId, $offset, $limit)
    {
        $news = $this->_model->where('news_cate_id', $cateId)
                            ->where('news_is_check', '1')
                            ->orderBy('id', 'desc')
                            ->offset($offset)
                            ->limit($limit)
                            ->get();

        return $news;
    }

    /**
     * Get one news by slug
     *
     * @param string $slug
     * @return mixed
     */
    public function getNewsSingle($slug)
    {
        $news = $this->_model->where('news_slug', $slug)
                            ->first();

        return $news;
    }

    /**
     * Count news number
     *
     * @return integer
     */
    public function countNews()
    {
        $countNews = $this->_model->count();

        return $countNews;
    }

    /**
     * Count news of users
     *
     * @return integer
     */
    public function countNewsUser()
    {
        $countNewsUser = $this->_model->where('news_user_id', Auth::id())->count();

        return $countNewsUser;
    }

    /**
     * Count number of checked news
     *
     * @return integer
     */
    public function countNewsCheck()
    {
        $countNewsCheck = $this->_model->where('news_user_id', Auth::id())
                                    ->where('news_is_check', '1')
                                    ->count();

        return $countNewsCheck;
    }

    /**
     * Get all news and subcategories of categories
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getAllNewsCate()
     */
    public function getAllNewsCate($id)
    {
        $news = $this->_model->getNewsInCategory()
                    ->where('id', '=', $id)
                    ->toArray();

        return array_values($news);
    }

    /**
     * Search news with keyword
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::searchNews()
     */
    public function searchNews($key)
    {
        $news = $this->_model->where('news_title', 'like', "%$key%")
                            ->orWhere('news_description', 'like', "%$key%")
                            ->orWhere('news_content', 'like', "%$key%")
                            ->get();

        return $news;
    }

    /**
     * Get all news of subcategories
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getAllNewsSubCate()
     */
    public function getAllNewsSubCate($id)
    {
        $news = $this->_model->where('news_cate_id', $id)->get();

        return $news;
    }

    /**
     * Get all unchecked news
     *
     * @see \App\Repositories\News\NewsRepositoriesInterface::getNewsNotCheck()
     */
    public function getNewsNotCheck()
    {
        $news = $this->_model->where('news_is_check', '=', '0')->get();

        return $news;
    }
}
