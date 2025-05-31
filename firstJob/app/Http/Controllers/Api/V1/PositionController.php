<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\V1\PositionResource;
use Illuminate\Support\Facades\Gate;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PositionResource::collection(Position::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        return new PositionResource(Position::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return new PositionResource($position);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        Gate::authorize('update-position');
        $position->update($request->all());
        return new PositionResource($position);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return response()->json([
            'message'=>'Position Deleted',
        ]);
    }

}
