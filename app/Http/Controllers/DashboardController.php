<?php

namespace App\Http\Controllers;

use App\Models\Arrivee;
use App\Models\Bordereau;
use App\Models\Contacts;
use App\Models\Dates;
use App\Models\Depart;
use App\Models\Employee;
use App\Models\Phones;
use App\Models\Todo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ariv_nbr=Arrivee::count();
        $dep_nbr=Depart::count();
        $bor_nbr=Bordereau::count();
        $cont_nbr=Contacts::count();
        $todos=Todo::all();
        $phones=Phones::all();
        $dates=Dates::all();
        $employees=Employee::all();
        return view('pages.dashboard',compact('todos','ariv_nbr','dep_nbr','bor_nbr','cont_nbr','phones','dates','employees'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
