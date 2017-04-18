<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * Create a new controller instance
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories and return the view of list categories
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $cate = $this->categoryRepository->getAll();

        return view('admin.category.list', [
            'data' => $cate
        ]);
    }

    public function show(Request $request)
    {}

    /**
     * Return the view of action create category
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Create new category and return success message
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->createCategory($request);

        return redirect()->route('category.index')->with('message', 'Thêm mới thành công !');
    }

    /**
     * Return the view of action update category information
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request)
    {
        $cate = $this->categoryRepository->find($request->id);

        return view('admin.category.edit', [
            'data' => $cate
        ]);
    }

    /**
     * Update category information and return success message
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request)
    {
        $this->categoryRepository->editCategory($request);

        return redirect()->route('category.index')->with('message', 'Cập nhật thành công !');
    }

    /**
     * Delete category and return success message
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->categoryRepository->delete($request->cate_id);

        return redirect()->back()->with('message', 'Xóa thành công !');
    }
}
