<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\V1\ApplicationResource;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApplicationResource::collection(Application::all());
    }

  

     public function apply(Position $position, StoreApplicationRequest $request)
    {
        return new ApplicationResource(Application::create($request->all()));
    }
}
