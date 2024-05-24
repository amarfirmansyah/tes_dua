<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorestatusRequest;
use App\Http\Requests\UpdatestatusRequest;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Status');
    }
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function list(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Status::all();
            return response()->json([
                'status' => 'success',
                'data' => StatusResource::collection($data)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'something when wrong in serve.. please try again'
            ]);
        }
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
    public function store(StorestatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatusRequest $request, status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status $status)
    {
        //
    }
}
