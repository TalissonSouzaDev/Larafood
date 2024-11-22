<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    protected $repository;

    public function __construct(Plan $plan)
    {
        $this->repository =  $plan;
    }
    

    public function index() {
        $plan = $this->repository->latest()->paginate(10);
        return view("admin.pages.plans.index",compact("plan"));
    }

    public function create() {
        return view("admin.pages.plans.create");
    }

    public function show( string $url ) {
        $plan = $this->repository->where("url",$url)->first();
        return !empty($plan) ? view("admin.pages.plans.show",compact("plan")) : redirect()->back();
    }

    public function edit( string $url ) {
        $plan = $this->repository->where("url",$url)->first();
        return !empty($plan) ? view("admin.pages.plans.edit",compact("plan")) : redirect()->back();
    }

    public function store(StoreUpdatePlan $request) {
        $this->repository->create($request->all());
        return redirect()->route("plan.index");
    }

    public function update(StoreUpdatePlan $request,int | string $url) {
        $plan = $this->repository->where("url",$url)->first();
        if(!$plan) {
            return redirect()->back();
        }
        $plan->update($request->all());
        return redirect()->route("plan.index");
    }

    public function destroy(int | string $url ) {
        $plan = $this->repository->where("url",$url)->first();
        if(!$plan) {
            return redirect()->back();
        }
        $plan->delete();

        return redirect()->route("plan.index");
    }

    public function search(Request $filter) {
        $plan = $this->repository
                        ->where("name","LIKE","%{$filter->filter}%")
                        ->orwhere("price","LIKE","%{$filter->filter}%")
                        ->orwhere("description","LIKE","%{$filter->filter}%")
                        ->paginate();
        return view("admin.pages.plans.index",compact("plan"));
    }
}
