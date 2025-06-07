<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\V1\CompanyResource;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('companies')){
            return response()->json([
                'message' => 'This route is not for you'
            ], 403);
        }
        return CompanyResource::collection(Company::all());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        if(Gate::denies('create-company')){
            return response()->json([
                'message' => 'This route is not for you'
            ], 403);
        }
        return new CompanyResource(Company::create($request->all()));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        if(Gate::denies('update-company', $company)){
            return response()->json([
                'message' => 'This route is not for you'
        ], 403);
        }
        return new CompanyResource($company);
    }

    
}
