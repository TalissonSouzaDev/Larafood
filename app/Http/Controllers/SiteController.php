<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
   protected $plan;
    public function __construct(Plan $plan)
    {
        return $this->plan = $plan;
        
    }
    

    public function index(){

       $plan =  $this->plan->with('details')->get();
        return view('site.home.index',compact('plan'));
    }

    public function plan($url){
       if(!$plan = Plan::where('url',$url)->first()){
        return redirect()->back();

       }
       session()->put("plan",$plan);
       return redirect()->route('register');

    }
}
