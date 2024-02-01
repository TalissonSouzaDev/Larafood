<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    public function __construct(category $category)
    {

        return [$this->category = $category,$this->middleware(['can:categories']) 
    ];

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {  
        $category = $this->category->latest()->paginate(10);

        return view('Admin.pages.category.index',compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
     
        $this->category->create($data);
     
        return redirect()->route('category.index')->with('sucess','Usuario Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $categoryShow = $this->category->where('id',$id)->first();
            $category = !empty($categoryShow) ? $categoryShow : [];

            return !empty($category) ? view("Admin.pages.category.show",compact('category')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     

            $categoryShow = $this->category->where('id',$id)->first();
            $category = !empty($categoryShow) ? $categoryShow : [];
            return !empty($category) ? view("Admin.pages.category.edit",compact('category')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)
    {
    
            $categoryShow = $this->category->where('id',$id)->first();
            $category = !empty($categoryShow) ? $categoryShow : [];
            $category->update($request->all());
            return !empty($category) ? redirect()->route('category.index')->with('sucess','Usuario atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
            $categoryShow = $this->category->where('id',$id)->first();
            $category = !empty($categoryShow) ? $categoryShow : [];
            $category->delete();
            return !empty($category) ? redirect()->route('category.index')->with('sucess','Perfil deletado com sucesso'): redirect()->back()->with('warning','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $category = $this->category->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.category.index',compact('category','filter'));
    }
}
