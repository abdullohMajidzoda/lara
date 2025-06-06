<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\V1\ApplicationResource;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('applications')){
            return response()->json([
                'message' => 'This route is not for you'
        ], 403);
        }
        return ApplicationResource::collection(Application::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());
        return new ApplicationResource($application);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return response()->json([
            'message'=>'Position Deleted',
        ]);
    }

  

     public function apply(StoreApplicationRequest $request, Position $position)
    {
        if(Gate::denies('apply', $position)){
            return response()->json([
                'message' => 'This route is not for you'
        ], 403);
        }
        return new ApplicationResource(Application::create($request->all()));
    }
}
