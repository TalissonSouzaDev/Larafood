<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{  private $product;
    public function __construct(Product $product)
    {

        return [
            $this->product = $product,
            $this->middleware(['can:products']) ];

        
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
        $product = $this->product->latest()->paginate(10);

        return view('Admin.pages.product.index',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $data = $request->all();
        $tenant = $this->Tenant_id();

        if(!empty($request->image)){
            $img = $request->file('image')->store("tenant/{$tenant}/products",'public');
            $data['image'] = $img;
        }
     
        $this->product->create($data);
     
        return redirect()->route('product.index')->with('sucess','Produto Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $productShow = $this->product->where('id',$id)->first();
            $product = !empty($productShow) ? $productShow : [];

            return !empty($product) ? view("Admin.pages.product.show",compact('product')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     

            $productShow = $this->product->where('id',$id)->first();
            $product = !empty($productShow) ? $productShow : [];
            return !empty($product) ? view("Admin.pages.product.edit",compact('product')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request,$id)
    {
    
            $productShow = $this->product->where('id',$id)->first();
            $data = $request->all();
        
            $product = !empty($productShow) ? $productShow : [];
            if(Storage::exists($product->image)){
                Storage::disk('public')->delete('storage/'.$product->image);
              }

              $tenant =  $this->Tenant_id();
              if(!empty($request->image)){
                $img = $request->file('image')->store("tenant/{$tenant}/products",'public');
                $data['image'] = $img;
            }
     
    
            $product->update($data);
            return !empty($product) ? redirect()->route('product.index')->with('sucess','Usuario atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
            $productShow = $this->product->where('id',$id)->first();
            $product = !empty($productShow) ? $productShow : [];

            if(!empty($product->image)){
                Storage::delete('storage/'.$product->image);
              }
            $product->delete();
            return !empty($product) ? redirect()->route('product.index')->with('sucess','Perfil deletado com sucesso'): redirect()->back()->with('warning','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $product = $this->product->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.product.index',compact('product','filter'));
    }
}
