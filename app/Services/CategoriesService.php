<?php

namespace App\Services;

use LaraSnap\LaravelAdmin\Models\Category;
use Illuminate\Http\Request;

class CategoriesService
{
    public function index(Request $request)
    {
        try{
            $categories = Category::select('id', 'name', 'label')->get();
            return $categories;
        } catch (\Exception $e) {
            return apiResponse("Categories are not listed", 400, (object)[]);
        }
    }
}

?>