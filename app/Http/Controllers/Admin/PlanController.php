<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    protected $plan;
    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
        $this->middleware(['can:plans']);
        
    }
    

    public function index(){
        $plan = $this->plan->latest()->paginate(10);

        return view('admin.pages.plans.index',compact('plan'));
    }

    public function create(){
        return view('admin.pages.plans.create');

    }

    public function store(PlanRequest $request){

        
        $this->plan->create($request->all());
        return redirect()->route('plan.index')->with('sucess','Plano Cadastrado com sucesso');
    }

    public function show($url){
        $plan = $this->plan->where('url',$url)->first();
        return view('admin.pages.plans.show',compact('plan'));

    }

    public function edit($planurl){
        $plan = $this->plan->where('url',$planurl)->first();
   
        return view('admin.pages.plans.edit',compact('plan'));

    }

    public function update(PlanRequest $request, $url){
        $plan = $this->plan->where('url',$url)->first();
      

        $plan->update($request->all());
        return redirect()->route('plan.index')->with('sucess','Plano Atualizado com sucesso');

    }

    public function destroy($url){
        $plan = $this->plan->where('url',$url)->first();
        if($plan->details()->count() >= 1){
            return redirect()->back()->with('warning','Ops parece que existir um detalhe vinculado');
        }
        $plan->delete();
        return redirect()->route('plan.index')->with('sucess','Plano excluido  com sucesso');
   
      

    }


    public function filter(Request $request){
        $plan = $this->plan->filter($request->filter);
        $filter = isset($filter) ? $filter : '';

        return view('admin.pages.plans.index',compact('plan','filter'));
    }

}
