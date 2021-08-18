<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CategoryParentRequest;
use App\Services\CategoryService;
use App\Models\Category;

class CategoryParentController extends Controller
{
    private $categoryService;

	/**
	* Injecting CategoryService.
	*/
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
	
    /**
     * Display a listing of the parent categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        setCurrentListPageURL('parent_categories');
        $filter_request = $this->categoryService->filterValue($request); //filter request
        $parentCategories = $this->categoryService->index($filter_request, 'p_category');

        return view('category-parent.index')->with(['parentCategories' => $parentCategories, 'filters' => $filter_request]);
    }

    /**
     * Show the form for creating a new parent category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('category-parent.create');
    }

    /**
     * Store a newly created parent category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryParentRequest $request)
    {
        $this->categoryService->store($request, 'p_category');
		
		return redirect()->route('p_categories.index')->withSuccess('Parent Category successfully created.');
    }

    /**
     * Display the specified parent category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified parent category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		try {
			$parentCategory = Category::findOrFail($id);
		}catch (ModelNotFoundException $exception) {
			return redirect()->route('p_categories.index')->withError('Parent Category not found by ID ' .$id);
		}
        return view('category-parent.edit', compact('parentCategory'));
    }

    /**
     * Update the specified parent category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryParentRequest $request, $id)
    {
        $this->categoryService->update($request, $id, 'p_category');
        $listPageURL = getPreviousListPageURL('parent_categories') ?? route('p_categories.index'); 
		
		return redirect($listPageURL)->withSuccess('Parent Category successfully updated.');
    }

    /**
     * Remove the specified parent category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id, 'p_category');
		
		return redirect()->route('p_categories.index')->withSuccess('Parent Category successfully deleted.');
    }
}
