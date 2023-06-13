<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResouce;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    private $tenant;
    public function __construct(Tenant $tenant)
    {

        $this->tenant = $tenant;
        
    }



    public function index(){
        return TenantResouce::collection($this->tenant->all());
    }

    public function show(string $uuid){
        if(!$tenant = $this->tenant->where("uuid",$uuid)->first()){
            return response()->json(['erros'=>'errors'],401);
        }

        return TenantResouce::colletion($tenant);
    }
}
