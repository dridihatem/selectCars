<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Mail;

class ContactController extends Controller
{
    public function index(){

            $titleBreadcrumbs = 'Contact';
            $titleSeo = 'contact - Select Cars';
            $descriptionSeo ='contact';
        
        return view('front.contact',compact('titleBreadcrumbs','titleSeo','descriptionSeo')); 
    }

    public function store(Request $request)
    {
       
       $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'sujet' =>'required',
            'contenu' =>'required'
        ]);

        $nom = $request->nom;
        $email = $request->email;
        $telephone = $request->telephone;
        $sujet = $request->sujet;
        $contenu = $request->contenu;

       
        Mail::to($email)->send(new ContactMail($nom,$email,$telephone,$sujet,$contenu));

            Contact::create($request->all());
            
            return redirect()->back()
                             ->with(['success'=>'Merci de nous avoir contacté. nous vous répondrons sous peu']);
        
        
    }

   

}
