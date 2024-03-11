<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Marque;
use DataTables;
class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter une marque';


        return view('back.marque.add',compact('titleSeo'));
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
        $marque = new Marque();

        if($request->file('image')) {

            $file = $request->file('image');
            $filename1 = time().'_'.$file->getClientOriginalName();
            $location = public_path('/images/marque');
            $file->move($location,$filename1);
          
          }
          $marque->titre = $request->titre;
          $marque->slug = Str::slug($request->titre,'-');
          $marque->status = $request->status;
          $marque->image = $filename1;
          $marque->save();
          
          return redirect()->route('admin.list_marques')->with('success', 'Marque ajouter avec succèe');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        //
    }
 /**
     * Admin list marque
     */
    public function adminlist_marque(Request $request){
       
        
        $titleSeo = 'Liste des marques'; 
        if ($request->ajax()) {
            $data = Marque::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                         
                            $btn = '<a href="list_marques/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer la marque?\')" href="list_marques/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.marque.list', compact('titleSeo'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marque = Marque::where('id',$id)->first();
        $titleSeo=$marque->titre;
        if(is_null($marque)){
                    return abort(404);
                }
                return view('back.marque.edit',compact('titleSeo','marque'));
    }
    public function deleteimage(Request $request)
    {
        $marque = Marque::find($request->id);
        $marque->image= null;
        $marque->save();
        return redirect()->back()->with('success','Image supprimer');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marque = Marque::find($id);
        if($request->file('image')) {

            $file = $request->file('image');
            $filename1 = time().'_'.$file->getClientOriginalName();
            $location = public_path('/images/marques');
            $file->move($location,$filename1);
          
          }
          else {
            $filename1 = $categorie->image;
          }
          
          $marque->titre = $request->titre;
          $marque->image = $filename1;
          $marque->slug = Str::slug($request->titre);
          $marque->status = $request->status;
          $marque->save();
          return redirect()->back()->with('success','Merci!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marque = Marque::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_marques')->with('success','Marque Supprimer');
    }
}
