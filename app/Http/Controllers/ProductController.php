<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiagramPieResource;
use App\Http\Resources\ProductConditionResource;
use App\Http\Resources\ProductResource;
use App\Models\product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Product');
    }

    /**
     * Show the form for creating a new resource.
     * @return JsonResponse
     */
    public function list(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::with([
                'manufacturer',
                'category',
                'status',
                'unit',
            ])->get();

            return response()->json([
                'status' => 'success',
                'data' => ProductResource::collection($data),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'something when wrong in serve.. please try again'
            ], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreproductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreproductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Product::create([
            'name' => $validated['name'],
            'manufacturer_id' => $validated['manufacturer']['id'],
            'category_id' => $validated['category']['id'],
            'status_id' => $validated['status']['id'],
            'unit_id' => $validated['unit']['id']
        ]);

        return to_route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateproductRequest $request
     * @param product $product
     * @return RedirectResponse
     */
    public function update(UpdateproductRequest $request, product $product): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        $product->name = $validated['name'];
        $product->manufacturer_id = $validated['manufacturer']['id'];
        $product->category_id = $validated['category']['id'];
        $product->status_id = $validated['status']['id'];
        $product->unit_id = $validated['unit']['id'];
        $product->save();

        return to_route('product');
    }

    /**
     * Remove the specified resource from storage.
     * @param product $product
     * @return RedirectResponse
     */
    public function destroy(product $product): RedirectResponse
    {
        $product->delete();
        return to_route('product');
    }

    /**
     * @return JsonResponse
     */
    public function statusCondition(): JsonResponse
    {
        try {
            $data = Product::with('status')
                ->select('status_id', DB::raw('count(*) as total'))
                ->groupBy('status_id')
                ->get();
            return response()->json([
                'status' => 'success',
                'data' => ProductConditionResource::collection($data),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'something when wrong in serve.. please try again'
            ], 422);
        }
    }

    /**
     * @return JsonResponse
     */
    public function diagram(): JsonResponse
    {
        $data = Status::with(['product' => ['category']])->get();

        $result = $data->map(function ($item) {
            $categories = $item->product->map(function ($product) {
                return $product->category->name;
            })->unique()->values()->all();

            $countProductByCategory = [];
            foreach ($categories as $categoryName) {
                $countProductByCategory[] = $item->product->filter(function ($product) use ($categoryName) {
                    return $product->category->name === $categoryName;
                })->count();
            }

            return [
                'id' => $item->id,
                'name' => $item->name,
                'categories' => $categories,
                'countProductByCategory' => $countProductByCategory,
            ];
        });

        return \response()->json([
            'status' => 'success',
            'data' => DiagramPieResource::collection($result),
        ]);
    }
}
