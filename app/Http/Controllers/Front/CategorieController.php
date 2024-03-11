<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\ModelVoiture;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use DataTables;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleBreadcrumbs = 'Catégorie';
            $titleSeo = 'Catégorie - Select Cars Auto';
            $descriptionSeo ='catégorie';
            $categories = Categorie::where('status',1)->get();
            return view('front.categorie.index', compact('titleBreadcrumbs','titleSeo','descriptionSeo','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter une catégorie';


        return view('back.categorie.add',compact('titleSeo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'titre' => 'required',
            'image' => 'file|required|mimes:jpg,png|max:800',
        ]);
        $categorie = new Categorie();

        if($request->file('image')) {

            $file = $request->file('image');
            $filename1 = time().'_'.$file->getClientOriginalName();
            $location = public_path('/images/categories');
            $file->move($location,$filename1);
          
          }
          $categorie->titre = $request->titre;
          $categorie->slug = Str::slug($request->titre,'-');
          $categorie->status = $request->status;
          $categorie->image = $filename1;
          $categorie->save();
          
          return redirect()->route('admin.list_categories')->with('success', 'Catégorie ajouter avec succèes');




    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie, Request $request)
    {


        $name_categorie =  Categorie::where('slug',$request->slug)->first();
         $categorie = Categorie::FindOrFail($name_categorie->id);

         

        $categorieTitre = $categorie->titre;
        $titleBreadcrumbs = $categorie->titre;
        $titleSeo = $categorie->titre.' - Select Cars Auto';
        $descriptionSeo =$categorie->titre;

        $voiture= Voiture::where('categorie_id',$name_categorie->id)
                          ->orderByDesc('created_at')
                          ->paginate(15);

        $count_voiture = Voiture::where('categorie_id',$name_categorie->id)->count();    
        $list_voiture = Voiture::where('categorie_id',$name_categorie->id)->first();  
                      
        $marque = Marque::where('id',$list_voiture->marque_id)->first();                  
        $marquefetch = Marque::where('status',1)->get();
        $categorieslist = Categorie::where('status',1)->get();
        $modele = ModelVoiture::where('status',1)->get();
        
        
        
        return view('front.categorie.list', compact('titleBreadcrumbs','titleSeo','descriptionSeo','voiture','count_voiture','categorieTitre','marque','marquefetch','categorieslist','modele'));
    }


    /**
     * Admin list categorie
     */
    public function adminlist_categorie(Request $request){
       
        
        $titleSeo = 'Liste des catégories'; 
        if ($request->ajax()) {
            $data = Categorie::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($image) {
                        $url= $image->image;
                        return $url;
                    })  
                    ->addColumn('status', function ($status) {
                        $status= $status->status ? '1' : '0';
                       return $status;
                       
                    })  
                     
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="list_categories/'.$row->id.'/detail" class="badge  bg-primary" style="padding:5px;margin-right:2px;"><i class="fa fa-eye"></i></a>';
                            $btn .= '<a href="list_categories/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer le catégorie?\')" href="list_categories/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.categorie.list', compact('titleSeo'));
}


/**
 * Afficher le detail de categorie
 */

 public function afficher($id)
{
    $categorie = Categorie::where('id',$id)->first();

       
        if(is_null($categorie)){
            return abort(404);
         }
          $titleSeo=$categorie->titre;
        return view('back.categorie.show',compact('titleSeo','categorie'));
}
    /**
     * 
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::where('id',$id)->first();
        $titleSeo=$categorie->titre;
        if(is_null($categorie)){
                    return abort(404);
                }
                return view('back.categorie.edit',compact('titleSeo','categorie'));
    }
 /**
     * Delete image1
     */
    public function deleteimage(Request $request)
    {
        $categorie = Categorie::find($request->id);
        $categorie->image= null;
        $categorie->save();
        return redirect()->back()->with('success','Image supprimer');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        if($request->file('image')) {

            $file = $request->file('image');
            $filename1 = time().'_'.$file->getClientOriginalName();
            $location = public_path('/images/categories');
            $file->move($location,$filename1);
          
          }
          else {
            $filename1 = $categorie->image;
          }
          
          $categorie->titre = $request->titre;
          $categorie->image = $filename1;
          $categorie->slug = Str::slug($request->titre);
          $categorie->status = $request->status;
          $categorie->save();
          return redirect()->back()->with('success','Merci!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_categories')->with('success','Catégorie Supprimer');
    }
}
