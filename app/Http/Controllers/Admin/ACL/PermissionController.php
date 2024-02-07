<?php

namespace App\Http\Controllers\Admin\ACL;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permission;
    public function __construct(permission $permission)
    {

    $this->permission = $permission;
    $this->middleware(['can:permissions']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission =$this->permission->paginate(10);

        return view('Admin.pages.permission.index',compact('permission'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
     

        $this->permission->create($request->all());
    
        return redirect()->route('permission.index')->with('sucess','Permissão adicionado com sucesso');
       
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   
            $permissionShow = $this->permission->where('id',$id)->first();
            $permission = !empty($permissionShow) ? $permissionShow : [];
            return !empty($permission) ? view("Admin.pages.permission.show",compact('permission')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $permissionShow = $this->permission->where('id',$id)->first();
            $permission = !empty($permissionShow) ? $permissionShow : [];
            return !empty($permission) ? view("Admin.pages.permission.edit",compact('permission')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request,$id)
    {
       
       
            $permissionShow = $this->permission->where('id',$id)->first();
            $permission = !empty($permissionShow) ? $permissionShow : [];
            $permission->update($request->all());
            return !empty($permission) ? redirect()->route('permission.index')->with('sucess','Permissão atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
            $permissionShow = $this->permission->where('id',$id)->first();
            $permission = !empty($permissionShow) ? $permissionShow : [];
            $permission->delete();
            return !empty($permission) ? redirect()->route('permission.index')->with('sucess','Permissão deletado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $permission = $this->permission->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.permission.index',compact('permission','filter'));
    }
}
