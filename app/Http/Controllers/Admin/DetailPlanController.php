<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
           protected $detailPlan, $plan;
    public function __construct(Plan $plan, DetailPlan $DetailPlan)
    {
        return [
            $this->plan = $plan, $this->detailPlan = $DetailPlan
        ,$this->middleware(['can:plans'])];
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlplan)
    {
        $plan = $this->plan->where('url',$urlplan)->first();

        $detail = $plan->details()->paginate(10);
        return view('Admin.pages.plans.detail.index',compact('plan','detail'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlplan)
    {
          $plan = $this->plan->where('url',$urlplan)->first();
        return view('Admin.pages.plans.detail.create',compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailPlanRequest $request,$urlplan)
    {


        $plan =  $this->plan->where('url',$urlplan)->first();
        $plan->details()->create($request->all());

        return redirect()->route('plan.detail.index',[$plan->url])->with('sucess',"Detalhe do Plano {$plan->name} cadastrado");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPlan  $detailPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($urlplan,$detailid)
    {
        $plan =  $this->plan->where('url',$urlplan)->first();
        $detail =  $this->detailPlan->where('id',$detailid)->first();
        return view('Admin.pages.plans.detail.edit',compact('plan','detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailPlan  $detailPlan
     * @return \Illuminate\Http\Response
     */
    public function update(DetailPlanRequest $request, $urlplan,$detailid)
    {
        $plan =  $this->plan->where('url',$urlplan)->first();
        $detail =  $this->detailPlan->where('id',$detailid)->first();
        $detail->update($request->all());

        return redirect()->route('plan.detail.index',[$plan->url])->with('sucess',"Detalhe do plano {$plan->name} Atualizado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPlan  $detailPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlplan,$detailid)
    {
        $detail =  $this->detailPlan->where('id',$detailid)->first();
        $plan =  $this->plan->where('url',$urlplan)->first();
        $detail->delete();
        return redirect()->route('plan.detail.index',[$plan->url])->with('sucess',"Detalhe do plano {$plan->name} deletado");
    }
}
