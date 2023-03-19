<?php

namespace App\Http\Controllers;

use App\Models\Arrivee;
use App\Models\Bureau;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class ArriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrivees=Arrivee::all();
        $bureaux=Bureau::all();
        $types=Type::all();
        return view('pages.arrivee', compact('arrivees','bureaux','types'));
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
             $arrivees=new Arrivee;

            if($request->file()) {
                $arrivees->Num_courie=$request->Num_courie;
                $arrivees->emetteur=$request->emetteur;
                $arrivees->date_envoi=$request->date_envoi;
                $arrivees->envoye_a=$request->envoye_a;
                $arrivees->objet=$request->objet;
                $arrivees->type_id=$request->type_id;
                $arrivees->bureau_id=$request->bureau_id;
                $arrivees->date_transfert=$request->date_transfert;
                $arrivees->obligation_repanse=$request->obligation_repanse;
                $arrivees->date_reponse=$request->date_reponse;

                $fileName = $request->Num_courie.'_'.date("m.d.y");
                $filePath = $request->file('file')->storeAs('arrivee', $fileName, 'public');
                $arrivees->fichier =  $fileName;
                $arrivees->id_user='1';
                $arrivees->save();
                return redirect()->back();
                // return back()->with('success','File has been uploaded.')
                // ->with('file', $fileName);
            }

        // return redirect()->back();
    }

    public function showpdf($id){
        $document = Arrivee::findOrFail($id);
        $filePath = $document->fichier;
        // file not found
        if( ! Storage::exists($filePath) ) {
        abort(404);
        }
        $pdfContent = Storage::get($filePath);
        // for pdf, it will be 'application/pdf'
        $type       = Storage::mimeType($filePath);
        $fileName   = Storage::name($filePath);
        return response()->file($fileName);
        // return Response::make($pdfContent, 200, [
        // 'Content-Type'        => $type,
        // 'Content-Disposition' => 'inline; filename="'.$fileName.'"'
        // ]);

        // $thi_file=Arrivee::findorfail($id);
        // $file = Arrivee::findOrFail($id);  
        // if (File::isFile($file->fichier)) {  
        //     $file = File::get($file);  
        //     $response = Response::make($file, 200);  
        //     $response->header('Content-Type', 'application/pdf');  
        //     return $response;  
        // } 
        // $destination = storage_path('app\public\uploads\\');  
        // $filename = $thi_file->fichier;
        // $pathToFile = $destination.$filename; 
        //   echo response()->file($pathToFile);
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
        // $request->validate([
        //     'file' => 'required|mimes:pdf|max:6908'
        //     ]);
             $arrivees= Arrivee::findOrFail($request->id);

            //  
                $arrivees->Num_courie=$request->Num_courie;
                $arrivees->emetteur=$request->emetteur;
                $arrivees->date_envoi=$request->date_envoi;
                $arrivees->envoye_a=$request->envoye_a;
                $arrivees->objet=$request->objet;
                $arrivees->type_id=$request->type_id;
                $arrivees->bureau_id=$request->bureau_id;
                $arrivees->date_transfert=$request->date_transfert;
                $arrivees->obligation_repanse=$request->obligation_repanse;
                $arrivees->date_reponse=$request->date_reponse;
                if($request->file()) {
                    $fileName = $request->Num_courie.'_'.date("m_d_y");
                $filePath = $request->file('file')->storeAs('arrivee', $fileName, 'public');
                $arrivees->fichier =  $fileName;
                } 
                $arrivees->id_user='1';
                $arrivees->update(); 
                toastr()->success('تم تعديل الملف');
                return redirect()->back();
                // return back()->with('success','File has been uploaded.')
                // ->with('file', $fileName);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrivee= Arrivee::findOrFail($id);
        $arrivee->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
}
