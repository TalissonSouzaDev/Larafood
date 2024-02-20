<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    protected $tenant;
    public function __construct(Tenant $tenant){
        $this->tenant = $tenant;
    }


     public function authuser(){
    return auth()->user()->tenant_id;
         
}

    public function index(){
       
        $tenant = $this->tenant->where('uuid',$this->authuser())->get();

        return view('Admin.pages.tenant.index',compact('tenant'));
    }
    public function show($uuid){
        $tenant = $this->tenant->with('plan')->where('uuid',$uuid)->first();

        return view('Admin.pages.tenant.show',compact('tenant'));
    }

    public function edit($uuid){
        $tenant = $this->tenant->where('uuid',$uuid)->first();

        return view('admin.pages.tenant.edit',compact('tenant'));
    }
    public function update(request $request, $uuid){
        $tenant = $this->tenant->where('uuid',$uuid)->first();
        $empresa = $this->authuser();
        $data = $request->all();
        
        if(!empty($tenant->logo)){
            Storage::disk('public')->delete("empresa/{$empresa}/".$tenant->logo);
        }
       
       if(!empty($request->logo)){
      
        $logo = $request->file('logo')->store("empresa/{$empresa}/");
        $data['logo'] = $logo;
       }

       
        $tenant->update($data);

        return redirect()->route('tenant.index')->with("success",'Empresa atualizada com sucesso');
    }


}
