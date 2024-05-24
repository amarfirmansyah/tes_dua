<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Category');
    }

    /**
     * Show the form for creating a new resource.
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try {
            $data = Category::all();
            return \response()->json([
                'status' => 'success',
                'data' => CategoryResource::collection($data),
            ]);
        } catch (\Exception $e) {
            return \response()->json([
                'status' => 'error',
                'message' => 'something when worong.. please try again',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param StorecategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StorecategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Category::create([
            'name' => $validated['name']
        ]);

        return to_route('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatecategoryRequest $request
     * @param category $category
     * @return RedirectResponse
     */
    public function update(UpdatecategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();

        $category->name = $validated['name'];
        $category->save();

        return to_route('category');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('category');
    }
}
