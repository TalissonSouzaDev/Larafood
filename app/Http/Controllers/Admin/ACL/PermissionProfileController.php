<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{

    protected $permission,$profile;
    public function __construct(Profile $profile, Permission $permission)
    {
        return [$this->profile = $profile,$this->permission = $permission,//$this->middleware(['can:permission','can:profile'])
    ];
        
    }
    public function permission($idprofile){

        if(!$profile = $this->profile->with('permission')->where('id',$idprofile)->first()){
            return redirect()->back();
        }
        $permission = $profile->permission()->paginate(10);

        return view('Admin.pages.profile.permission.permission',compact('profile','permission'));
    }

    public function PermissionAvailable(request $request ,$idprofile){

        if(!$profile = $this->profile->with('permission')->where('id',$idprofile)->first()){
            return redirect()->back();
        }
        $id= $profile->id;
        $permission = $this->profile->profileAvailable($id,$request->filter);
        return view('Admin.pages.profile.permission.available',compact('profile','permission'));
    }


    public function attachpermissionprofile(Request $request,$idprofile){
        if(!$profile = $this->profile->with('permission')->where('id',$idprofile)->first()){
            return redirect()->back();
        }
        if(!isset($request->permission) || empty($request->permission) ){
            return redirect()->back()->with('warning','Ops precisa pelo menos uma permissão selecionada');
        }


        $profile->permission()->attach($request->permission);
        return redirect()->route('profile.permission',[$profile->id])->with('sucess','Permission vinculada');
    }


    public function detachpermissionprofile($idprofile,$idpermission){
        $profile = $this->profile->where('id',$idprofile)->first();
        $permission = $this->permission->where('id',$idpermission)->first();
        
        if(!$profile || !$permission){
            return redirect()->back()->with('warning','Ops algum deu errado');
        }
      


        $profile->permission()->detach($permission);
        return redirect()->route('profile.permission',[$profile->id])->with('sucess','Desvinculado com sucesso');

    }
}
