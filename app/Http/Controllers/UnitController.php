<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreunitRequest;
use App\Http\Requests\UpdateunitRequest;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Unit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreunitRequest $request)
    {
        $validated = $request->validated();

        Unit::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type']
        ]);
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        try {
            $data = Unit::all();
            return response()->json([
                'status' => 'success',
                'data' => UnitResource::collection($data)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'something when wrong in serve.. please try again'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateunitRequest $request, Unit $unit)
    {
        $validated = $request->validated();

        $unit->name = $validated['name'];
        $unit->description = $validated['description'];
        $unit->type = $validated['type'];
        $unit->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return to_route('product');
    }
}
