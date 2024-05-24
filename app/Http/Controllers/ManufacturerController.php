<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerResource;
use App\Models\manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoremanufacturerRequest;
use App\Http\Requests\UpdatemanufacturerRequest;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Manufacturer');
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
    public function store(StoremanufacturerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Manufacturer::all();
            return response()->json([
                'status' => 'error',
                'data' => ManufacturerResource::collection($data)
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
    public function edit(manufacturer $manufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemanufacturerRequest $request, manufacturer $manufacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manufacturer $manufacturer)
    {
        //
    }
}
