<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Voiture;
use App\Models\Banner;
use App\Models\ModelVoiture;




class HomeController extends Controller
{
  public function index(){
    $titleBreadcrumbs = 'Accueil';
    $titleSeo = 'Accueil - Select Cars Auto';
    $descriptionSeo ='Accueil';

    $categories = Categorie::where('status', 1)->take(8)->get(); 
    $marques = Marque::where('status', 1)->get(); //Get marque where status=1


    $voiture_nouveau= Voiture::where('nouveau',1)->take(8)->orderByDesc('created_at')->get();
    $voiture_ancien= Voiture::where('categorie_id',1)->take(8)->orderByDesc('created_at')->get();
    $voiture_commercial= Voiture::where('categorie_id',2)->take(8)->orderByDesc('created_at')->get();
   

    $banner = Banner::get();

return view('front.home',compact('titleBreadcrumbs','titleSeo','descriptionSeo','categories','marques','voiture_nouveau','voiture_ancien','voiture_commercial','banner')); 
  }  



  public function getModels($id)
  {
    $model = ModelVoiture::where('id_marque',$id)->pluck("titre","id");

   return json_encode($model);
  }


  public function search(Request $request)
  {
    $titleBreadcrumbs = 'Recherche';
    $titleSeo = 'Recherche - Select Cars Auto';
    $descriptionSeo ='Recherche';

  

    $search = Voiture::query();

    if(request()->has('categories')) {
      $search->where('categorie_id',  $request->categories);
    }
    if(request()->has('marque')) {
      $search->where('marque_id',  $request->marque);
    }
    if(request()->has('energie')) {
      $search->where('energie','LIKE', "%{$request->energie}%");
    }
    if(request()->has('prix_min') && request()->has('prix_max')) {
      $search->whereBetween('prix', [number_format($request->prix_min,0,'',''), number_format($request->prix_max,0,'','')]);
    }
    if(request()->has('modele')) {
      $search->where('modele','LIKE', "%{$request->modele}%");
    }

    if(request()->has('nature')) {
      $search->where('nature','LIKE', "%{$request->nature}%");
    }

    if(request()->has('cylindre')) {
      $search->where('nbre_cylindre','LIKE', "%{$request->cylindre}%");
    }

    if(request()->has('annee_min') && request()->has('annee_max')) {
      $search->whereBetween('annee', [$request->annee_min, $request->annee_max]);
    }


    
    $query = $search->paginate(6);
   




    /*$search = Voiture::where('categorie_id', $request->categories)
                      ->where('marque_id',$marque)
                      ->where('energie','LIKE', "%{$energie}%")
                      ->whereBetween('prix', [number_format($prix_min,0,'',''), number_format($prix_max,0,'','')])
                      ->simplePaginate(6);*/





    return view('front.search',compact('titleBreadcrumbs','titleSeo','descriptionSeo','query'));
  }
}
