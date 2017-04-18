<?php
namespace App\Repositories\SubCategory;

interface SubCategoryRepositoryInterface
{
    /**
     * Get subcategory by selected news
     *
     * @param integer $id
     */
    public function getBySelected($id);

    /**
     * Create subcategory
     *
     * @param array $request
     */
    public function createSubCategory($request = []);

    /**
     * Edit subcategory
     *
     * @param array $request
     */
    public function editSubCategory($request = []);

    /**
     * Count number of subcategories
     */
    public function countSubCategory();
}