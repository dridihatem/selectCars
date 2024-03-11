<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Voiture;
use App\Models\DemandeVisite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function __construct(){
        if(!Auth::guard('admin')->check()){
            return redirect()->route('login.form'); 
        }
    }
    public function login_form()
    {

        $titleSeo = 'Admin Login Form';
        if(!Auth::guard('admin')->check()){
        return view('back.admin_login',compact('titleSeo'));
        }
        else{
            return view('back.dashboard',compact('titleSeo'));   
        }
    }

    //todo: admin login functionality
    public function login_functionality(Request $request){
        $request->validate([
            'login'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('admin')->attempt(['login' => $request->login, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }else{
            Session::flash('error-message','Login ou mot de passe incorrecte');
            return back();
        }
    }

    public function dashboard()
    {
        $titleSeo = 'Tableau de bord';
        if(Auth::guard('admin')->check()){
          



                $voiture  = Voiture::get();
                $voiture_vendue  = Voiture::where('status',0)->get();
                $voiture_disponible  = Voiture::where('status',1)->get();
                $demande_visite = DemandeVisite::get();
            return view('back.dashboard',compact('titleSeo','voiture','voiture_vendue','voiture_disponible','demande_visite'));  
        }
        else{
            return redirect()->route('login.form');
        }
       
    }

    public function calendar(Request $request){
        if(Auth::guard('admin')->check()){

        
            $data = DemandeVisite::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title','start','end']);

            return response()->json($data);
        
    }
    else{
        return redirect()->route('login.form');
    }
    }
        public function settings(Request $request){

            $titleSeo = 'Settings';
            $admin = Admin::find(1)->first();


            return view('back.settings',compact('admin','titleSeo'));
        }

    public function logoutadmin(){
        Auth::guard('admin')->logout();
        return redirect()->route('login.form');
    }




    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'login' => 'required',
            'password' => ['required', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()]
        ]);

        $admin = Admin::find($id);
        
        $admin->name= $request->name;
        $admin->type=1;
        $admin->login =  $request->login;
        $admin->password = Hash::make( $request->password);
        $admin->save();
        return redirect()->back()->with('success','Succès');
    }

}
