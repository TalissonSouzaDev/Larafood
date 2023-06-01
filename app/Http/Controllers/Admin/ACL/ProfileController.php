<?php

namespace App\Http\Controllers\Admin\ACL;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     protected $profile;
    public function __construct(Profile $profile)
    {

    $this->profile = $profile; $this->middleware(['can:profile']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile =$this->profile->paginate(10);

        return view('Admin.pages.profile.index',compact('profile'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
       try{
        $this->profile->create($request->all());
        return redirect()->route('profile.index')->with('sucess','Perfil adicionado com sucesso');
       } catch(Exception $e){
        return redirect()->route('profile.index')->with('errors','Ops algum deu errado');
       }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   
            $profileShow = $this->profile->where('id',$id)->first();
            $profile = !empty($profileShow) ? $profileShow : [];
            return !empty($profile) ? view("Admin.pages.profile.show",compact('profile')) : redirect()->back()->with('erros','Ação não encontrada');
          
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $profileShow = $this->profile->where('id',$id)->first();
            $profile = !empty($profileShow) ? $profileShow : [];
            return !empty($profile) ? view("Admin.pages.profile.edit",compact('profile')) : redirect()->back()->with('erros','Ação não encontrada');
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request,$id)
    {
       
       
            $profileShow = $this->profile->where('id',$id)->first();
            $profile = !empty($profileShow) ? $profileShow : [];
            $profile->update($request->all());
            return !empty($profile) ? redirect()->route('profile.index')->with('sucess','Perfil atualizado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
            
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
            $profileShow = $this->profile->where('id',$id)->first();
            $profile = !empty($profileShow) ? $profileShow : [];
            $profile->delete();
            return !empty($profile) ? redirect()->route('profile.index')->with('sucess','Perfil deletado com sucesso'): redirect()->back()->with('erros','Ação não encontrada');
           
    }

    public function filter(Request $request){
 
        $profile = $this->profile->filter($request->filter);
        $filter = !empty($filter) ? $filter : '';
        return  view('Admin.pages.profile.index',compact('profile','filter'));
    }
}
