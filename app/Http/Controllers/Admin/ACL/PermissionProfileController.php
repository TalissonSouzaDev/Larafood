<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\permission;
use App\Models\profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(profile $profile,permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions(string $idprofile) {
        $profile = $this->profile->where("id",$idprofile)->first();
        if(!$profile) {
            return redirect()->back();
        }
        $permissions = $profile->permissions()->paginate();
        return view("admin.pages.profile.permission.index",compact("profile","permissions"));
    }

    public function profile(string $idpermission) {
        $permission = $this->permission->where("id",$idpermission)->first();
        if(!$permission) {
            return redirect()->back();
        }
        $profiles = $permission->profile()->paginate();
        return view("admin.pages.profile.permission.index",compact("profiles","permission"));
    }

    public function permissionsAvailable(Request $request,string $idprofile) {
        $profile = $this->profile->where("id",$idprofile)->first();
        if(!$profile) {
            return redirect()->back();
        }
        $filter = null;
        if($request->filter) {
            $filter = $request->filter;
        }
        $permissions = $profile->permissionsAvailable($filter,$idprofile);
        return view("admin.pages.profile.permission.available",compact("profile","permissions"));
    }

    public function attachPermissionsProfile(Request $request, string $idprofile) {
        $profile = $this->profile->where("id",$idprofile)->first();
        if(!$profile) {
            return redirect()->back();
        }
        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back();
        }
        $profile->permissions()->attach($request->permissions);
        return redirect()->route("profile.permission",$profile->id);
    }
    public function detachPermissionsProfile(string $idprofile,$idpermission) {
        $profile = $this->profile->where("id",$idprofile)->first();
        $permission = $this->permission->where("id",$idpermission)->first();
        if(!$profile || !$permission) {
            return redirect()->back();
        }
        $profile->permissions()->detach($permission);
        return redirect()->route("profile.permission",$profile->id);
    }
}
