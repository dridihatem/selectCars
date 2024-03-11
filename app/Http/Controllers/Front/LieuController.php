<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lieu;
use Illuminate\Http\Request;
use DataTables;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          
    }



    /**
     * liste des lieu
     */

     public function adminlist_lieu(Request $request)
     {
        $titleSeo = 'Liste des lieux'; 
        if ($request->ajax()) {
            $data = Lieu::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                          
                            $btn = '<a href="list_lieux/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer le lieu?\')" href="list_lieux/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.lieu.list', compact('titleSeo'));
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter un lieu';


        return view('back.lieu.add',compact('titleSeo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      
        $request->validate([
            'titre' => 'required',
            'frame_map' => 'required',
        ]);
        $lieu = new Lieu();

       
          $lieu->titre = $request->titre;
          $lieu->frame_map = $request->frame_map;
          $lieu->save();
          
          return redirect()->route('admin.list_lieux')->with('success', 'Lieu ajouter avec succèes');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lieu $lieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lieu = Lieu::where('id',$id)->first();
        $titleSeo=$lieu->titre;
        if(is_null($lieu)){
                    return abort(404);
                }
                return view('back.lieu.edit',compact('titleSeo','lieu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lieu = Lieu::find($id);
        
          
          $lieu->titre = $request->titre;
          $lieu->frame_map = $request->frame_map;
          $lieu->save();
          return redirect()->back()->with('success','Merci!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lieu = Lieu::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_lieux')->with('success','Lieu Supprimer');
        
    }
}
