<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $titleBreadcrumbs = 'Login';
        $titleSeo = 'login - Select Cars Auto';
        $descriptionSeo ='login';
    
    return view('front.login',compact('titleBreadcrumbs','titleSeo','descriptionSeo')); 
    }
}
