<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Models\Type;
use Illuminate\Http\Request;

class ParamsController extends Controller
{
    //
    
    public function index()
    {
        $bureaux=Bureau::all();
        $types=Type::all();
        
        return view('pages.params', compact('bureaux','types'));
    }
    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required'
            ]);
             $type=new Type;  
            $type->name=$request->name;
            $type->id_user='1';
            $type->save();
        return redirect()->back();
    }
    public function storeBureau(Request $request)
    {
        $request->validate([
            'name' => 'required'
            ]);
            $bureau=new Bureau;  
            $bureau->name=$request->name;
            $bureau->id_user='1';
            $bureau->save();
        return redirect()->back();
    }
    public function deleteType($id)
    {
        $type= Type::findOrFail($id);
        $type->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
    public function deleteBureau($id)
    {
        $bureau= Bureau::findOrFail($id);
        $bureau->delete();
        toastr()->success('تم حذف الملف بنجاح');
        return redirect()->back();
    }
}
