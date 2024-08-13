<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subcategories(Request $request): JsonResponse
    {
        $subcategories = SubCategory::activated()->whereIn('c_id', $request->categories)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $subcategories
        ]);
    }
}
