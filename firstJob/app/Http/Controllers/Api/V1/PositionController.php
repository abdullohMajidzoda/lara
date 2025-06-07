<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\V1\PositionResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\FilterRequest;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $query = Position::query();

        if(isset($data['description'])){
            $query->where('description', 'like', "%{$data['description']}%");
        }

        if(isset($data['location'])){
            $query->where('location', 'like', "%{$data['location']}%");
        }

        if(isset($data['employment_type'])){
            $query->where('employment_type', 'like', "%{$data['employment_type']}%");
        }

        $res = $query->get();
        return PositionResource::collection($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        if(Gate::denies('create-position')){
            return response()->json([
                'message' => 'This route is not for you'
            ], 403);
        }
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
        $position->update($request->all());
        if(Gate::denies('update-position', $position)){
            return response()->json([
                'message' => 'This route is not for you'
        ], 403);
        }
        return new PositionResource($position);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        if(Gate::denies('delete-position', $position)){
            return response()->json([
                'message' => 'This route is not for you'
        ], 403);
        }

        return response()->json([
            'message'=>'Position Deleted',
        ]);

    }
}