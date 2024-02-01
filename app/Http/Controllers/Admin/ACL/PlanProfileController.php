<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;
    public function __construct(Plan $plan,Profile $profile)
    {

        return [
            $this->plan = $plan,
            $this->profile= $profile,
            //$this->middleware(['can:plans','can:profiles'])
        ];
        
    }




    public function profile($idplan){
        if(!$plan = $this->plan->with('profile')->where('id',$idplan)->first()){return redirect()->back();}

        $profile = $plan->profile()->paginate(10);

        return view('Admin.pages.plans.profile.profile',compact("profile",'plan'));
    }

    public function profileAvailable(request $request,$idplan){
        if(!$plan = $this->plan->where('id',$idplan)->with('profile')->first()){return redirect()->back();}
        $id = $plan->id;
        $profile = $plan->planavailable($id,$request->filter);

        return view('Admin.pages.plans.profile.available',compact("profile",'plan'));
    }

    public function attachplanprofile(request $request,$idplan){
        $plan = $this->plan->where('id',$idplan)->with('profile')->first();
      
        if(!$plan){return redirect()->back();}
        if(!isset($request->profile) || empty($request->profile) ){
            return redirect()->back()->with('warning','Ops precisa pelo menos uma permissão selecionada');
        }

        $plan->profile()->attach($request->profile);
        return redirect()->route('plan.profile',[$plan->id])->with('sucess','Permission vinculada');
        
        }


        public function detachplanprofile($idplan,$idprofile){
            $plan = $this->plan->where('id',$idplan)->first();
            $profile = $this->profile->where('id',$idprofile)->first();
            if(!$plan || !$profile){return redirect()->back()->with('warning','Ops algum deu errado');}

            $plan->profile()->detach($profile->id);
            return redirect()->route('plan.profile',[$plan->id])->with('sucess','Desvinculado com sucesso');

        }
        
}
