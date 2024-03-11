<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ModelVoiture;
use Illuminate\Http\Request;
use App\Models\Marque;
use Illuminate\Support\Str;
use DataTables;
class ModelVoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

     /**
     * Admin list marque
     */
    public function adminlist_modele(Request $request){
       
        
        $titleSeo = 'Liste des modèles'; 
        if ($request->ajax()) {
            $data = ModelVoiture::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('id_marque', function($marque){
                        $marque = Marque::where('id',$marque->id_marque)->first()->titre;
                        return $marque;
                    })
                    ->addColumn('action', function($row){
       
                         
                            $btn = '<a href="list_modeles/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer le modèle?\')" href="list_modeles/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.model.list', compact('titleSeo'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter un modèle';


        return view('back.model.add',compact('titleSeo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required'
        ]);
        $modelVoiture = new ModelVoiture();

       
          $modelVoiture->titre = $request->titre;
          $modelVoiture->id_marque = $request->id_marque;
          $modelVoiture->status = $request->status;
          $modelVoiture->save();
          
          return redirect()->route('admin.list_modeles')->with('success', 'Catégorie ajouter avec succèes');

    }

    /**
     * Display the specified resource.
     */
    public function show(ModelVoiture $modelVoiture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     
    public function edit($id)
    {
        $modelVoiture = ModelVoiture::where('id',$id)->first();
        $titleSeo=$modelVoiture->titre;
        if(is_null($modelVoiture)){
                    return abort(404);
                }
                return view('back.model.edit',compact('titleSeo','modelVoiture'));
    }

    public function update(Request $request, $id)
    {
        $modelVoiture = ModelVoiture::find($id);
       
          $modelVoiture->titre = $request->titre;
          $modelVoiture->id_marque = $request->id_marque;
          $modelVoiture->status = $request->status;
          $modelVoiture->save();
          return redirect()->back()->with('success','Merci!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $modelVoiture = ModelVoiture::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_modeles')->with('success','Modèle Supprimer');
    }
}
