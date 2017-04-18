<?php

namespace App\Repositories\News;

interface NewsRepositoriesInterface
{
    /**
     * Find news by slug
     *
     * @param string $slug
     */
    public function findBySlug($slug);

    /**
     * Get all news by user id
     *
     * @param integer $id
     */
    public function getNewsByUser($id);

    /**
     * Create news
     *
     * @param array $request
     */
    public function createNews($request = []);

    /**
     * Delete news
     *
     * @param integer $id
     */
    public function destroyNews($id);

    /**
     * Edit news
     * @param integer $id
     * @param array $request
     */
    public function editNews($id, $request = []);

    /**
     * Check if news valid
     *
     * @param integer $id
     */
    public function checkNews($id);

    /**
     * Get news if news is hot
     *
     * @param integer $offset
     * @param integer $limit
     */
    public function getNewsHot($offset, $limit);

    /**
     * Get all checked news
     *
     * @param integer $offset
     * @param integer $limit
     */
    public function getNewsCheck($offset, $limit);

    /**
     * Count number of news
     */
    public function countNews();

    /**
     * Count news of user
     */
    public function countNewsUser();

    /**
     * Count number of checked news
     */
    public function countNewsCheck();

    /**
     * Get all news of categories
     *
     * @param integer $id
     */
    public function getAllNewsCate($id);

    /**
     * Serch news with keyword
     *
     * @param string $key
     */
    public function searchNews($key);

    /**
     * Get all news of subcategories
     *
     * @param string $slug
     */
    public function getAllNewsSubCate($slug);

    /**
     * Get all unchecked news
     */
    public function getNewsNotCheck();
}