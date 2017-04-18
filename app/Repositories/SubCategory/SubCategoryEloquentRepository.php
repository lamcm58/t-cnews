<?php
namespace App\Repositories\SubCategory;

use App\Repositories\EloquentRepository;

class SubCategoryEloquentRepository extends EloquentRepository implements SubCategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\SubCategory::class;
    }

    /**
     * Get subcategory by selected news
     *
     * @see \App\Repositories\SubCategory\SubCategoryRepositoryInterface::getBySelected()
     */
    public function getBySelected($id)
    {
        $result = $this->_model->where('id', '=', $id)->first();

        return $result;
    }

    /**
     * Create subcategory
     *
     * @see \App\Repositories\SubCategory\SubCategoryRepositoryInterface::createSubCategory()
     */
    public function createSubCategory($request = [])
    {
        $data = $request->all();
        $data['sub_cate_slug'] = $this->slugify($data['sub_category_name']);
        $this->create($data);
    }

    /**
     * Edit subcategory
     *
     * @see \App\Repositories\SubCategory\SubCategoryRepositoryInterface::editSubCategory()
     */
    public function editSubCategory($request = [])
    {
        $data = $request->all();
        $data['sub_cate_slug'] = $this->slugify($data['sub_category_name']);
        $this->update($data['id'], $data);
    }

    /**
     * Count number of subcategory
     *
     * @return integer
     */
    public function countSubCategory()
    {
        $countSub = $this->_model->count();

        return $countSub;
    }

    /**
     * Get all subcategories of categories
     *
     * @param integer $id
     * @return mixed
     */
    public function getAllSubCateById($id)
    {
        $result = $this->_model->where('category_id', '=', $id)->get();

        return $result;
    }

    /**
     * Get all subcategories by slug
     *
     * @param string $slug
     * @return mixed
     */
    public function getAllSubCateBySlug($slug)
    {
        $result = $this->_model->where('sub_cate_slug', $slug)->first();

        return $result;
    }
}