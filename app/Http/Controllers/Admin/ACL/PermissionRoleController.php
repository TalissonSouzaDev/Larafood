<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{

    protected $permission,$role;
    public function __construct(role $role, Permission $permission)
    {
        return [$this->role = $role,$this->permission = $permission,
        $this->middleware(['can:permission','can:roles'])
    ];
        
    }
    public function permission($idrole){

        if(!$role = $this->role->with('permission')->where('id',$idrole)->first()){
            return redirect()->back();
        }
        $permission = $role->permission()->paginate(10);

        return view('Admin.pages.role.permission.permission',compact('role','permission'));
    }

    public function PermissionAvailable(request $request ,$idrole){

        if(!$role = $this->role->with('permission')->where('id',$idrole)->first()){
            return redirect()->back();
        }
        $id= $role->id;
        $permission = $this->role->roleAvailable($id,$request->filter);
        return view('Admin.pages.role.permission.available',compact('role','permission'));
    }


    public function attachpermissionrole(Request $request,$idrole){
        if(!$role = $this->role->with('permission')->where('id',$idrole)->first()){
            return redirect()->back();
        }
        if(!isset($request->permission) || empty($request->permission) ){
            return redirect()->back()->with('warning','Ops precisa pelo menos uma permissão selecionada');
        }


        $role->permission()->attach($request->permission);
        return redirect()->route('role.permission',[$role->id])->with('sucess','Permission vinculada');
    }


    public function detachpermissionrole($idrole,$idpermission){
        $role = $this->role->where('id',$idrole)->first();
        $permission = $this->permission->where('id',$idpermission)->first();
        
        if(!$role || !$permission){
            return redirect()->back()->with('warning','Ops algum deu errado');
        }
      


        $role->permission()->detach($permission);
        return redirect()->route('role.permission',[$role->id])->with('sucess','Desvinculado com sucesso');

    }
}
