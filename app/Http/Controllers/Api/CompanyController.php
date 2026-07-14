<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $company->load('employees');
        return new CompanyResource($company);
    }
}
