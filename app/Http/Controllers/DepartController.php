<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use App\Models\Type;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //2
        
        $departs=Depart::all();
        $types=Type::all();
        return view('pages.depart', compact('departs','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'file' => 'required|mimes:pdf|max:6908'
            ]);
             $depart=new Depart;

            if($request->file()) {
                $depart->Num_courie=$request->Num_courie;
                $depart->envoye_a=$request->envoye_a;
                $depart->date_envoi=$request->date_envoi;
                $depart->objet=$request->objet;
                $depart->type_id=$request->type_id;
                
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('depart', $fileName, 'public');
                $depart->fichier =  $fileName;
                $depart->id_user='1';
                $depart->save();
                return redirect()->back();
                // return back()->with('success','File has been uploaded.')
                // ->with('file', $fileName);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $depart= Depart::findOrFail($request->id);
                $depart->Num_courie=$request->Num_courie;
                $depart->envoye_a=$request->envoye_a;
                $depart->date_envoi=$request->date_envoi;
                $depart->objet=$request->objet;
                $depart->type_id=$request->type_id;
                if($request->file()) {
                    $fileName = time().'_'.$request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('depart', $fileName, 'public');
                    $depart->fichier =  $fileName;
                }
                
                $depart->id_user='1';
                $depart->update();
                return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depart = Depart::findOrFail($id);
        $depart->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
}
