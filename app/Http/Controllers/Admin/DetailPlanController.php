<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{

    protected $repository, $plan;
    public function __construct(DetailPlan $detailPlan,Plan $plan)
    {
        $this->repository =  $detailPlan;
        $this->plan = $plan;
    }

    public function index(string $urlplan) {
        if (!$plan = $this->plan->where("url",$urlplan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view("admin.pages.plans.details.index",compact("plan","details"));
    }

    public function create(string $urlplan) {

        if (!$plan = $this->plan->where("url",$urlplan)->first()) {
            return redirect()->back();
        }
        return view("admin.pages.plans.details.create",compact("plan"));
    }

    public function store(StoreUpdateDetailPlan $request, string $urlplan) {
        if (!$plan = $this->plan->where("url",$urlplan)->first()) {
            return redirect()->back();
        }
        $plan->details->create($request->all());
        return redirect()->route("detail.plan.index",$plan->url);
    }

    public function edit(string $urlplan,$idDetail) {

        $plan = $this->plan->where("url",$urlplan)->first();
        $detail = $this->repository->find($idDetail);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        return view("admin.pages.plans.details.edit",compact("plan","detail"));
    }

    public function update(StoreUpdateDetailPlan $request, string $urlplan,$idDetail) {
        $plan = $this->plan->where("url",$urlplan)->first();
        $detail = $this->repository->find($idDetail);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        $detail->update($request->all());
        return redirect()->route("detail.plan.index",$plan->url);
    }

    public function destroy(string $urlplan,$idDetail) {

        $plan = $this->plan->where("url",$urlplan)->first();
        $detail = $this->repository->find($idDetail);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        $detail->delete();
        return redirect()->route("detail.plan.index",$plan->url);
    }
}
