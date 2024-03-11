<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\ModelVoiture;
use App\Models\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use DataTables;


class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleBreadcrumbs = 'Véhicules';
        $titleSeo = 'Véhicules - Select Cars Auto';
        $descriptionSeo ='Véhicules';
        $count_voiture = Voiture::count();    
        $voitures = Voiture::orderBy('created_at','desc')->paginate(6);
        $marquefetch = Marque::where('status',1)->get();
        $categorieslist = Categorie::where('status',1)->get();
        $modele = ModelVoiture::where('status',1)->get();
        return view('front.voiture.list',compact('titleBreadcrumbs','titleSeo','descriptionSeo','voitures','count_voiture','marquefetch','categorieslist','modele'));
    }


    /** 
     *  Display detail of vehicule
     * 
    */

    public function detail(Request $request)
    {

       
     
        if(!empty($request->reference)) {

            $voiture = Voiture::where('reference',$request->reference)->first();
            $voiture->increment('visite');
       

            $categorieVoiture = Categorie::where('id',$voiture->categorie_id)->first();
            $marqueVoiture = Marque::where('id',$voiture->marque_id)->first();
            $titleBreadcrumbs = $voiture->titre;
            $titleSeo = $voiture->titre.' - Select Cars Auto';
            $descriptionSeo =$voiture->titre;
            $url = $request->fullUrl();
            $voiture_plus = Voiture::where('reference', '<>',$request->reference)->take(8)->get();
            $voiture_viewer = Voiture::where('reference','<>',$request->reference)->orderBy('visite','asc')->take(4)->get();
         
            return view('front.voiture.detail',compact('titleBreadcrumbs','titleSeo','descriptionSeo','categorieVoiture','marqueVoiture','voiture','voiture_plus','voiture_viewer'));
        }
        else {
            abort(404);
        }
       
    }


    /**
     * ADMIN CONTROLLER
     * 
     */

     /**
     * ADMIN CONTROLLER
     * 
     */
    public function adminlist_voiture_vendues(Request $request){
       
        
      $titleSeo = 'Liste des véhicules vendues'; 
      if ($request->ajax()) {
          $data = Voiture::select('*')->where('status',0)->orderBy('id','desc');
          return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('image', function ($image) {
                      $url= $image->image1;
                      return $url;
                  }) 
                  ->addColumn('prix', function ($prix) {

                      $prix= number_format($prix->prix,2).' €';
                      return $prix;
                  })  
                  ->addColumn('status', function ($status) {
                      $status= $status->status ? '1' : '0';
                     return $status;
                     
                  })  
              
                  ->addColumn('action', function($row){
     
                          $btn = '<a href="list_voitures/'.$row->id.'/detail" class="badge  bg-primary" style="padding:5px;margin-right:2px;"><i class="fa fa-eye"></i></a>';
                          $btn .= '<a href="list_voitures/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                          $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer la véhicule?\')" href="list_voitures/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
    
                          return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
      }
  return view('back.voiture.vendue', compact('titleSeo'));
}

public function adminlist_voiture_disponibles(Request $request){
       
        
  $titleSeo = 'Liste des véhicules disponibles'; 
  if ($request->ajax()) {
      $data = Voiture::select('*')->where('status',1)->orderBy('id','desc');
      return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('image', function ($image) {
                  $url= $image->image1;
                  return $url;
              }) 
              ->addColumn('prix', function ($prix) {

                  $prix= number_format($prix->prix,2).' €';
                  return $prix;
              })  
              ->addColumn('status', function ($status) {
                  $status= $status->status ? '1' : '0';
                 return $status;
                 
              })  
          
              ->addColumn('action', function($row){
 
                      $btn = '<a href="list_voitures/'.$row->id.'/detail" class="badge  bg-primary" style="padding:5px;margin-right:2px;"><i class="fa fa-eye"></i></a>';
                      $btn .= '<a href="list_voitures/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                      $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer la véhicule?\')" href="list_voitures/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';

                      return $btn;
              })
              ->rawColumns(['action'])
              ->make(true);
  }
return view('back.voiture.disponible', compact('titleSeo'));
}



    public function adminlist_voiture(Request $request){
       
        
            $titleSeo = 'Liste des véhicules'; 
            if ($request->ajax()) {
                $data = Voiture::select('*')->orderBy('id','desc');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('image', function ($image) {
                            $url= $image->image1;
                            return $url;
                        }) 
                        ->addColumn('prix', function ($prix) {

                            $prix= number_format($prix->prix,2).' €';
                            return $prix;
                        })  
                        ->addColumn('status', function ($status) {
                            $status= $status->status ? '1' : '0';
                           return $status;
                           
                        })  
                    
                        ->addColumn('action', function($row){
           
                                $btn = '<a href="list_voitures/'.$row->id.'/detail" class="badge  bg-primary" style="padding:5px;margin-right:2px;"><i class="fa fa-eye"></i></a>';
                                $btn .= '<a href="list_voitures/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                                $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer la véhicule?\')" href="list_voitures/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
          
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
        return view('back.voiture.list', compact('titleSeo'));
    }

/**
 * show details vehicule
 * function voir 
 */

 



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter une véhicule';
        $marque = Marque::get();
        $categorie = Categorie::get();
        $lieu = Lieu::get();
        $random_reference = Str::upper(Str::random(6)); 


        return view('back.voiture.add',compact('titleSeo','marque','categorie','lieu','random_reference'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        /*dd($request->all());*/
        $request->validate([
            'reference' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'image1' => 'file|required|mimes:jpg,png|max:800',
            'image2' => 'file|mimes:jpg,png|max:800',
            'image3' => 'file|mimes:jpg,png|max:800',
            'image4' => 'file|mimes:jpg,png|max:800',
            'image5' => 'file|mimes:jpg,png|max:800',
            'nature' => 'required',
            'categorie_id' => 'required',
            'marque_id' => 'required',
            'prix' => 'required|numeric',
            'energie' => 'required'
            ]);
            $voiture = new Voiture();

            if($request->file('image1')) {

                $file = $request->file('image1');
                $filename1 = time().'_'.$file->getClientOriginalName();
                $location = public_path('/images/voitures');
                $file->move($location,$filename1);
              
              }
              if($request->file('image2')) {

                $file = $request->file('image2');
                $filename2 = time().'_'.$file->getClientOriginalName();
                $location = public_path('/images/voitures');
                $file->move($location,$filename2);
                
              }
              else {
                $filename2=NULL;
              }
              if($request->file('image3')) {

                $file = $request->file('image3');
                $filename3 = time().'_'.$file->getClientOriginalName();
                $location = public_path('/images/voitures');
                $file->move($location,$filename3);
              }
              else {
                $filename3=NULL;
              }

              if($request->file('image4')) {

                $file = $request->file('image4');
                $filename4 = time().'_'.$file->getClientOriginalName();
                $location = public_path('/images/voitures');
                $file->move($location,$filename4);
                
              }
              else {
                $filename4=NULL;
              }
              if($request->file('image5')) {

                $file = $request->file('image5');
                $filename5 = time().'_'.$file->getClientOriginalName();
                $location = public_path('/images/voitures');
                $file->move($location,$filename5);
                
              }
              else {
                $filename5= NULL;
              }




              
           
            $voiture->reference = $request->reference;
            $voiture->titre = $request->titre;
            $voiture->description = $request->description;
            $voiture->image1 = $filename1;
            $voiture->image2 = $filename2;
            $voiture->image3 = $filename3;
            $voiture->image4= $filename4;
            $voiture->image5 = $filename5;
            $voiture->slug = Str::slug($request->reference.$request->titre, '-');
            $voiture->status = $request->status;
            $voiture->prix = $request->prix;
            $voiture->categorie_id = $request->categorie_id;
            $voiture->marque_id = $request->marque_id;
            $voiture->modele = $request->modele ? $request->modele : '';
            $voiture->type = $request->type;
            $voiture->nature = $request->nature;
            $voiture->energie = $request->energie;
            $voiture->annee = $request->annee;
            $voiture->kilometrage = $request->kilometrage;
            $voiture->nbre_cylindre = $request->nbre_cylindre;
            $voiture->lieu = $request->lieu;
            $voiture->save();
            return redirect()->route('admin.list_voitures')->with('success', 'Véhicule ajouter avec succèes');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    
    {
        $voiture = Voiture::where('id',$id)->first();

       
        if(is_null($voiture)){
            return abort(404);
         }
          $titleSeo=$voiture->titre;
        return view('back.voiture.show',compact('titleSeo','voiture'));
    }


    /**
     * check reference existe
     */

     public function checkReference(Request $request){
        $reference = $request->input('reference');
        $isExists = Voiture::where('reference','LIKE',"%{$reference}%")->first();
        if($isExists){
            return 'Référence existe déjà';
        }else{
            return '';
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voiture = Voiture::where('id',$id)->first();
        if(is_null($voiture)){
                    return abort(404);
                }
        $titleSeo=$voiture->titre;
        $lieu = Lieu::get();
        
        $marque = Marque::get();
        $categorie = Categorie::get();

        
         
        return view('back.voiture.edit',compact('titleSeo','voiture','lieu','marque','categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       

        $voiture = Voiture::find($id);
      
        if($request->file('image1')) {

          $file = $request->file('image1');
          $filename1 = time().'_'.$file->getClientOriginalName();
          $location = public_path('/images/voitures');
          $file->move($location,$filename1);
        
        }
        else {
          $filename1 = $voiture->image1;
        }
        if($request->file('image2')) {

          $file = $request->file('image2');
          $filename2 = time().'_'.$file->getClientOriginalName();
          $location = public_path('/images/voitures');
          $file->move($location,$filename2);
          
        }
        else {
          $filename2=$voiture->image2;
        }
        if($request->file('image3')) {

          $file = $request->file('image3');
          $filename3 = time().'_'.$file->getClientOriginalName();
          $location = public_path('/images/voitures');
          $file->move($location,$filename3);
        }
        else {
          $filename3=$voiture->image3;
        }

        if($request->file('image4')) {

          $file = $request->file('image4');
          $filename4 = time().'_'.$file->getClientOriginalName();
          $location = public_path('/images/voitures');
          $file->move($location,$filename4);
          
        }
        else {
          $filename4=$voiture->image4;
        }
        if($request->file('image5')) {

          $file = $request->file('image5');
          $filename5 = time().'_'.$file->getClientOriginalName();
          $location = public_path('/images/voitures');
          $file->move($location,$filename5);
          
        }
        else {
          $filename5 = $voiture->image5;
        }
        
            $voiture->reference = $request->reference;
            $voiture->titre = $request->titre;
            $voiture->description = $request->description;
            $voiture->image1 = $filename1;
            $voiture->image2 = $filename2;
            $voiture->image3 = $filename3;
            $voiture->image4= $filename4;
            $voiture->image5 = $filename5;
            $voiture->slug = Str::slug($request->reference.$request->titre, '-');
            $voiture->status = $request->status;
            $voiture->prix = $request->prix;
            $voiture->categorie_id = $request->categorie_id;
            $voiture->marque_id = $request->marque_id;
            $voiture->modele = $request->modele ? $request->modele : '';
            $voiture->type = $request->type;
            $voiture->nature = $request->nature;
            $voiture->energie = $request->energie;
            $voiture->annee = $request->annee;
            $voiture->kilometrage = $request->kilometrage;
            $voiture->nbre_cylindre = $request->nbre_cylindre;
            $voiture->lieu = $request->lieu;
       
        $voiture->save();
        return redirect()->back()->with('success','Merci!');
    }


    /**
     * Delete image1
     */
    public function deleteimage1(Request $request)
    {
        $voiture = Voiture::find($request->id);
        $voiture->image1= null;
        $voiture->save();
        return redirect()->back()->with('success','Image 1 supprimer');
    }
      /**
     * Delete image
     */
    public function deleteimage2(Request $request)
    {
        $voiture = Voiture::find($request->id);
        $voiture->image2= null;
        $voiture->save();
        return redirect()->back()->with('success','Image 2 supprimer');
    }
       /**
     * Delete image
     */
    public function deleteimage3(Request $request)
    {
        $voiture = Voiture::find($request->id);
        $voiture->image3= null;
        $voiture->save();
        return redirect()->back()->with('success','Image 3 supprimer');
    }
        /**
     * Delete image
     */
    public function deleteimage4(Request $request)
    {
        $voiture = Voiture::find($request->id);
        $voiture->image4= null;
        $voiture->save();
        return redirect()->back()->with('success','Image 4 supprimer');
    }
        /**
     * Delete image
     */
    public function deleteimage5(Request $request)
    {
        $voiture = Voiture::find($request->id);
        $voiture->image5= null;
        $voiture->save();
        return redirect()->back()->with('success','Image 5 supprimer');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $voiture = Voiture::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_voitures')->with('success','Véhicule Supprimer');
    }
}
