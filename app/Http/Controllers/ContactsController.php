<?php

namespace App\Http\Controllers;

use App\Models\Bordereau;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts=Contacts::all();
        return view('pages.contacts',compact('contacts'));
    }
    public function index1()
    {
        //
        $contacts=Contacts::all();
        return view('pages.contacts1',compact('contacts'));
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
                $contact=new Contacts();
                $contact->nom_contact =  $request->nom_contact;
                $contact->telephone =  $request->telephone;
                $contact->telephone2 =  $request->telephone2;
                $contact->fax =  $request->fax;
                $contact->email =  $request->email;
                $contact->email2 =  $request->email2;
                $contact->adresse =  $request->adresse;
                $contact->id_user='1';
                $contact->save();
                return redirect()->back();
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
        $contact= Contacts::findOrFail($request->id);
        $contact->nom_contact =  $request->nom_contact;
        $contact->telephone =  $request->telephone;
        $contact->telephone2 =  $request->telephone2;
        $contact->fax =  $request->fax;
        $contact->email =  $request->email;
        $contact->email2 =  $request->email2;
        $contact->adresse =  $request->adresse;
        $contact->id_user='1';
        $contact->update();
        toastr()->success('تم التعديل بنجاح');
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
        $contacts= Contacts::findOrFail($id);
        $contacts->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
}
