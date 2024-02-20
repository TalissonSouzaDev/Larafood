<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $role;
    public function __construct(role $role)
    {

    $this->role = $role;
    $this->middleware(['can:roles']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = $this->role->paginate(10);

        return view('Admin.pages.role.index',compact('role'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
     
            //dd($request->all());
        $this->role->create($request->all());
    
        return redirect()->route('role.index')->with('sucess','Cargo adicionado com sucesso');
       
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   
            $roleShow = $this->role->where('id',$id)->first();
            $role = !empty($roleShow) ? $roleShow : [];
            return !empty($role) ? view("Admin.pages.role.show",compact('role')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $roleShow = $this->role->where('id',$id)->first();
            $role = !empty($roleShow) ? $roleShow : [];
            return !empty($role) ? view("Admin.pages.role.edit",compact('role')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request,$id)
    {
       
       
            $roleShow = $this->role->where('id',$id)->first();
            $role = !empty($roleShow) ? $roleShow : [];
            $role->update($request->all());
            return !empty($role) ? redirect()->route('role.index')->with('sucess','Cargo atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
            $roleShow = $this->role->where('id',$id)->first();
            $role = !empty($roleShow) ? $roleShow : [];
            $role->delete();
            return !empty($role) ? redirect()->route('role.index')->with('sucess','Cargo deletado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $role = $this->role->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.role.index',compact('role','filter'));
    }
}
