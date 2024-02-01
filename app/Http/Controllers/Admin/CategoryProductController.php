<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $category,$product;
    public function __construct(Product $product, category $category)
    {
        return [$this->product = $product,$this->category = $category,$this->middleware(['can:categories','can:products'])
    ];
        
    }
    public function categories($idproduct){

        if(!$product = $this->product->with('category')->where('id',$idproduct)->first()){
            return redirect()->back();
        }
        $category = $product->category()->paginate(10);

        return view('Admin.pages.product.category.category',compact('product','category'));
    }

    public function categoryAvailable(request $request ,$idproduct){


        if(!$product = $this->product->with('category')->where('id',$idproduct)->first()){
            return redirect()->back();
        }
        $id= $product->id;
        $category = $this->product->productAvailable($id,$request->filter);
        return view('Admin.pages.product.category.available',compact('product','category'));
    }



    public function attachcategoryproduct(Request $request,$idproduct){

  
        if(!$product = $this->product->with('category')->where('id',$idproduct)->first()){
            return redirect()->back();
        }
        if(!isset($request->category) || empty($request->category) ){
            return redirect()->back()->with('warning','Ops precisa pelo menos uma permissão selecionada');
        }


        $product->category()->attach($request->category);
        return redirect()->route('product.category',[$product->id])->with('sucess','category vinculada');
    }


    public function detachcategoryproduct($idproduct,$idcategory){
        $product = $this->product->where('id',$idproduct)->first();
        $category = $this->category->where('id',$idcategory)->first();
        
        if(!$product || !$category){
            return redirect()->back()->with('warning','Ops algum deu errado');
        }
      


        $product->category()->detach($category);
        return redirect()->route('product.category',[$product->id])->with('sucess','Desvinculado com sucesso');

    }
}
