<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'logo' => $this->logo ? url('storage/' . $this->logo) : null,
            'website' => $this->website,
            'employee_count' => $this->employees->count(),
            'employees' => EmployeeResource::collection($this->employees),
        ];
    }
}
