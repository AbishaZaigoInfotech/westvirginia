<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoriesService;
use App\Http\Resources\CategoriesCollection;

class CategoryController extends Controller
{
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoriesService->index($request);
        if($categories){
            $categories = CategoriesCollection::collection($categories);
            return apiResponse("Categories listed successfully", 200, $categories);
        }
    }
}
