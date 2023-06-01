<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tables;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $table;
    public function __construct(tables $table)
    {

        return [
            $this->table = $table,
        $this->middleware(['can:tables']) ];

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {  
        $table = $this->table->latest()->paginate(10);

        return view('Admin.pages.table.index',compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $data = $request->all();
     
        $this->table->create($data);
     
        return redirect()->route('table.index')->with('sucess','Usuario Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $tableShow = $this->table->where('id',$id)->first();
            $table = !empty($tableShow) ? $tableShow : [];

            return !empty($table) ? view("Admin.pages.table.show",compact('table')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     

            $tableShow = $this->table->where('id',$id)->first();
            $table = !empty($tableShow) ? $tableShow : [];
            return !empty($table) ? view("Admin.pages.table.edit",compact('table')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,$id)
    {
    
            $tableShow = $this->table->where('id',$id)->first();
            $table = !empty($tableShow) ? $tableShow : [];
            $table->update($request->all());
            return !empty($table) ? redirect()->route('table.index')->with('sucess','Usuario atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
            $tableShow = $this->table->where('id',$id)->first();
            $table = !empty($tableShow) ? $tableShow : [];
            $table->delete();
            return !empty($table) ? redirect()->route('table.index')->with('sucess','Perfil deletado com sucesso'): redirect()->back()->with('warning','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $table = $this->table->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.table.index',compact('table','filter'));
    }
}
