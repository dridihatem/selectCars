<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DemandeVisite;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class DemandeVisiteController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'email' => 'required|email',
            'telephone' => 'required|numeric'
        ]);

        $demandevisite  = new DemandeVisite();

        $voiture= Voiture::where('reference','LIKE',"%{$request->reference}%")->first();
        $demandevisite->title = 'Demande de visite pour '.$request->reference.' - '.$voiture->titre;
        $demandevisite->nom = $request->nom;
        $demandevisite->prenom = $request->prenom;
        $demandevisite->email = $request->email;
        $demandevisite->telephone = $request->telephone;
        $demandevisite->message= $request->message;
        $demandevisite->reference= $voiture->reference;
        $demandevisite->start= Carbon::parse($voiture->date_rdv);
        $demandevisite->end = Carbon::parse($voiture->date_rdv)->addHour();

       
        

        $demandevisite->save();
           
            return redirect()->back()
                             ->with(['success'=>'Rendez-vous confirmé ! Un e-mail récapitulatif des détails vous sera bientôt envoyé. Merci de choisir Select Cars.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $demande  = DemandeVisite::find($id)->first();
        $titleSeo = 'Demande';
        
        return view('back.demande.show',compact('titleSeo','demande'));
    }


     /**
     * Admin list categorie
     */
    public function adminlist_demande_visite(Request $request){
       
        
        $titleSeo = 'Liste des demandes'; 
        if ($request->ajax()) {
            $data = DemandeVisite::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="demande_visites/'.$row->id.'/detail" class="badge  bg-primary" style="padding:5px;margin-right:2px;"><i class="fa fa-eye"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer la demande?\')" href="demande_visites/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.demande.list', compact('titleSeo'));
}



   

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $demande = DemandeVisite::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_demande_visite')->with('success','Demande Supprimer');
    }
}
