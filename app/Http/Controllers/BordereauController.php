<?php

namespace App\Http\Controllers;

use App\Models\Bordereau;
use Illuminate\Http\Request;

class BordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bordereaus=Bordereau::all();
        return view('pages.bordereau', compact('bordereaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:6908'
            ]);
             $bordereau=new Bordereau;

            if($request->file()) {
                $bordereau->Num_courie=$request->Num_courie;
                $bordereau->emetteur=$request->emetteur;
                $bordereau->date_envoi=$request->date_envoi;
                $bordereau->envoye_a=$request->envoye_a;
                $bordereau->objet=$request->objet;
                $bordereau->type=$request->type;
                $bordereau->tranfere_a=$request->tranfere_a;
                $bordereau->date_transfert=$request->date_transfert;
                $bordereau->obligation_repanse=$request->obligation_repanse;
                $bordereau->date_reponse=$request->date_reponse;

                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('bordereau', $fileName, 'public');
                $bordereau->fichier =  $fileName;
                $bordereau->id_user='1';
                $bordereau->save();
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
        $bordereau= Bordereau::findOrFail($request->id);
        $bordereau->Num_courie=$request->Num_courie;
        $bordereau->emetteur=$request->emetteur;
        $bordereau->date_envoi=$request->date_envoi;
        $bordereau->envoye_a=$request->envoye_a;
        $bordereau->objet=$request->objet;
        $bordereau->type=$request->type;
        $bordereau->tranfere_a=$request->tranfere_a;
        $bordereau->date_transfert=$request->date_transfert;
        $bordereau->obligation_repanse=$request->obligation_repanse;
        $bordereau->date_reponse=$request->date_reponse;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('bordereau', $fileName, 'public');
            $bordereau->fichier = $fileName;
        }
        $bordereau->id_user='1';
        $bordereau->update();
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
        $borderau= Bordereau::findOrFail($id);
        $borderau->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
}
