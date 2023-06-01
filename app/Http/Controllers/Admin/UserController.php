<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {

        return [
            $this->user = $user ,
            $this->middleware(['can:users'])
        ];

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function Tenant_id(){
        return auth()->user()->tenant_id;
     }
    public function index()
    {  
        $user = $this->user->where('tenant_id',$this->Tenant_id())->paginate(10);

        return view('Admin.pages.user.index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['tenant_id'] = $this->Tenant_id();
        $data['password'] = bcrypt($request->password);

        $this->user->create($data);
     
        return redirect()->route('user.index')->with('sucess','Usuario Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $userShow = $this->user->where('id',$id)->first();
            $user = !empty($userShow) ? $userShow : [];

            return !empty($user) ? view("Admin.pages.user.show",compact('user')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     

            $userShow = $this->user->where('id',$id)->first();
            $user = !empty($userShow) ? $userShow : [];
            return !empty($user) ? view("Admin.pages.user.edit",compact('user')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,$id)
    {
       $data = $request->only(['name','email']);
       if($request->password){
        $data['password'] = bcrypt($request->password); 
       }
            $userShow = $this->user->where('id',$id)->first();
            $user = !empty($userShow) ? $userShow : [];
            $user->update($data);
            return !empty($user) ? redirect()->route('user.index')->with('sucess','Usuario atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $authuser = auth()->user()->id;
         if($authuser == $id){
            return redirect()->back()->with('warning','Ops, voce não pode excluir seu proprio usuario');
         }
            $userShow = $this->user->where('id',$id)->first();
            $user = !empty($userShow) ? $userShow : [];
            $user->delete();
            return !empty($user) ? redirect()->route('user.index')->with('sucess','Perfil deletado com sucesso'): redirect()->back()->with('warning','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $user = $this->user->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.user.index',compact('user','filter'));
    }
}
