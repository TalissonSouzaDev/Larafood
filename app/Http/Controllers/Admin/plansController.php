<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use  App\Models\plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;

class plansController extends Controller
{
    
    public function index(){
        $planos= plan::latest()->paginate();

        return view('admin.pages.plans.index',['planos'=>$planos]);
    }
    
    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){
       $data = $request ->all();
       $data['url'] = Str::kebab($request->nome);
       $create = plan::create($data);

        return redirect()->route('plano.index');
    }

    public function show($url){
        $dados = plan::where('url',$url)->first();

        if(!$dados){
            redirect()->back();
        }
        return view('admin.pages.plans.show',['plano'=>$dados]);
    }

    public function delete($url){
        $dados = plan::where('url',$url)->first();

        if(!$dados)
            redirect()->back();
        
       $dados->delete();
      return redirect()->route('plano.index');
    }
public function search(StoreUpdatePlan $request){
    $planos = new plan();
    $planos ->search($request->filter);

    return view('admin.pages.plans.index',['planos'=>$planos]);
}

public function edit($url){
    $dados = plan::where('url',$url)->first();

    if(!$dados)
        redirect()->back();

return view('admin.pages.plans.edit',['plano' =>$dados]);

}


public function update(StoreUpdatePlan $request,$url){
    $dados = plan::where('url',$url)->first();

    if(!$dados)
        redirect()->back();

        $dados ->update($request->all());

return redirect()->route('plano.index');}}
