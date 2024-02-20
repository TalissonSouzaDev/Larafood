<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $user, $role;
    public function __construct(User $user,role $role)
    {

        return [
            $this->user = $user,
            $this->role= $role,
            $this->middleware(['can:users','can:roles'])
        ];
        
    }




    public function role($iduser){
        if(!$user = $this->user->find($iduser)->first())
           {return redirect()->back();}

        $role = $user->role()->paginate(10);

        return view('Admin.pages.users.role.role',compact("role",'user'));
    }

    public function roleAvailable(request $request,$iduser){
        if(!$user = $this->user->where('id',$iduser)->with('role')->first()){return redirect()->back();}
        $id = $user->id;
        $role = $user->rolesAvailable($id,$request->filter);

        return view('Admin.pages.users.role.available',compact("role",'user'));
    }

    public function attachuserrole(request $request,$iduser){
        $user = $this->user->where('id',$iduser)->first();
      
        if(!$user){return redirect()->back();}
        if(!isset($request->role) || empty($request->role) ){
            return redirect()->back()->with('warning','Ops precisa pelo menos uma permissão selecionada');
        }

        $user->role()->attach($request->role);
        return redirect()->route('user.role',[$user->id])->with('sucess','Permission vinculada');
        
        }


        public function detachuserrole($iduser,$idrole){
            $user = $this->user->where('id',$iduser)->first();
            $role = $this->role->where('id',$idrole)->first();
            if(!$user || !$role){return redirect()->back()->with('warning','Ops algum deu errado');}

            $user->role()->detach($role->id);
            return redirect()->route('user.role',[$user->id])->with('sucess','Desvinculado com sucesso');

        }
}
