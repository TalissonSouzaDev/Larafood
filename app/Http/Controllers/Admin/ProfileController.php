<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(profile $profile)
    {
        $this->repository = $profile;
    }
    
    public function index() {
        $profile = $this->repository->latest()->paginate(10);
        return view("admin.pages.profiles.index",compact("profile"));
    }

    public function create() {
        return view("admin.pages.profiles.create");
    }

    public function show( string $id ) {
        $profile = $this->repository->where("id",$id)->first();
        return !empty($profile) ? view("admin.pages.profiles.show",compact("profile")) : redirect()->back();
    }

    public function edit( string $id ) {
        $profile = $this->repository->where("id",$id)->first();
        return !empty($profile) ? view("admin.pages.profiles.edit",compact("profile")) : redirect()->back();
    }

    public function store(StoreUpdateProfile $request) {
        $this->repository->create($request->all());
        return redirect()->route("profile.index");
    }

    public function update(StoreUpdateprofile $request,int | string $id) {
        $profile = $this->repository->where("id",$id)->first();
        if(!$profile) {
            return redirect()->back();
        }
        $profile->update($request->all());
        return redirect()->route("profile.index");
    }

    public function destroy(int | string $id ) {
        $profile = $this->repository->where("id",$id)->first();
        if(!$profile) {
            return redirect()->back();
        }
        if ($profile->detail->count() > 0) {
            return redirect()->back()->with("error","Existe detalhes vinculados a esse profileo, portando remove os detalhes");
        } 
        $profile->delete();

        return redirect()->route("profile.index");
    }

    public function search(Request $filter) {
        $profile = $this->repository
                        ->where("name","LIKE","%{$filter->filter}%")
                        ->orwhere("price","LIKE","%{$filter->filter}%")
                        ->orwhere("description","LIKE","%{$filter->filter}%")
                        ->paginate();
        return view("admin.pages.profiles.index",compact("profile"));
    }
}
