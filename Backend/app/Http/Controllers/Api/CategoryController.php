<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Get Categories.
     *
     * Getting the list of the categories
     *
     * @queryParam page Which page to show. Example: 12
     */
    public function index(): CategoryResource
    {
        // abort_if(! auth()->user()->tokenCan('categories-list'), 403);

        // return CategoryResource::collection(Category::all());
        return new CategoryResource(Cache::remember('categories', 60 * 60 * 24, function () {
            return Category::all();
        }));
    }

    public function show(Category $category)
    {
        // abort_if(! auth()->user()->tokenCan('categories-show'), 403);

        return new CategoryResource($category);
    }

    /**
     * POST categories.
     *
     * @bodyParam name string required Name of the category. Example: "Clothing"
     * @bodyParam description string required Description of the category. Example: "new category"
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'categories/'.Str::uuid().'.'.$file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }

        $category = Category::create($request->all());

        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        // return response(null, Response::HTTP_NO_CONTENT);
        return response()->noContent();
    }
}
