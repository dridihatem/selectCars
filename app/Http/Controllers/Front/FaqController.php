<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
            $titleBreadcrumbs = 'Faq';
            $titleSeo = 'faq - Select Cars Auto';
            $descriptionSeo ='faq';

            $faq = Faq::orderByDesc('created_at')->get();
        
        return view('front.faq',compact('titleBreadcrumbs','titleSeo','descriptionSeo','faq')); 
        
    }

    public function adminlist_faq(Request $request)
    {
        $titleSeo = 'Liste des Faq'; 
        if ($request->ajax()) {
            $data = Faq::select('*')->orderBy('id','desc');
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                   
                    ->addColumn('action', function($row){
       
                            
                            $btn = '<a href="list_faq/'.$row->id.'/edit" class="badge  bg-success" style="padding:5px;margin-right:2px;"><i class="fa fa-pencil-alt"></i></a>';
                            $btn .= '<a onclick="return confirm(\'Vous êtes sûr de supprimer le Faq?\')" href="list_faq/'.$row->id.'/delete" class="badge  bg-danger" style="padding:5px;margin-right:2px;"><i class="fa fa-trash"></i></a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('back.faq.list', compact('titleSeo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleSeo = 'Ajouter une Faq';


        return view('back.faq.add',compact('titleSeo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'reponse' => 'required'
        ]);
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->reponse = $request->reponse;
        $faq->save();
        return redirect()->route('admin.list_faq')->with('success', 'Faq ajouter avec succèes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $titleSeo="Détail de FAQ";
        $faq = Faq::findOrFail($id)->first();
        return view('back.faq.edit',compact('titleSeo','faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
      
          
          $faq->question = $request->question;
          $faq->reponse = $request->reponse;
          $faq->save();
          return redirect()->back()->with('success','Merci!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::where('id',$id)->firstOrFail()->delete();
        

        return redirect()->route('admin.list_faq')->with('success','Faq Supprimer');
    }
}
