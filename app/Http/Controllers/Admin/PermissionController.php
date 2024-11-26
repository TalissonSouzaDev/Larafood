<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(permission $permisson)
    {
        $this->repository = $permisson;
    }
    
    public function index() {
        $permisson = $this->repository->latest()->paginate(10);
        return view("admin.pages.permissons.index",compact("permisson"));
    }

    public function create() {
        return view("admin.pages.permissons.create");
    }

    public function show( string $id ) {
        $permisson = $this->repository->where("id",$id)->first();
        return !empty($permisson) ? view("admin.pages.permissons.show",compact("permisson")) : redirect()->back();
    }

    public function edit( string $id ) {
        $permisson = $this->repository->where("id",$id)->first();
        return !empty($permisson) ? view("admin.pages.permissons.edit",compact("permisson")) : redirect()->back();
    }

    public function store(StoreUpdatePermission $request) {
        $this->repository->create($request->all());
        return redirect()->route("permisson.index");
    }

    public function update(StoreUpdatePermission $request,int | string $id) {
        $permisson = $this->repository->where("id",$id)->first();
        if(!$permisson) {
            return redirect()->back();
        }
        $permisson->update($request->all());
        return redirect()->route("permisson.index");
    }

    public function destroy(int | string $id ) {
        $permisson = $this->repository->where("id",$id)->first();
        if(!$permisson) {
            return redirect()->back();
        }
        if ($permisson->detail->count() > 0) {
            return redirect()->back()->with("error","Existe detalhes vinculados a esse permissono, portando remove os detalhes");
        } 
        $permisson->delete();

        return redirect()->route("permisson.index");
    }

    public function search(Request $filter) {
        $permisson = $this->repository
                        ->where("name","LIKE","%{$filter->filter}%")
                        ->orwhere("price","LIKE","%{$filter->filter}%")
                        ->orwhere("description","LIKE","%{$filter->filter}%")
                        ->paginate();
        return view("admin.pages.permissons.index",compact("permisson"));
    }
}
