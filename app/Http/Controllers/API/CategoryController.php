<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoriesService;

class CategoryController extends Controller
{
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoriesService->index($request);
        return apiResponse("Categories listed successfully", 200, $categories);
    }
}
