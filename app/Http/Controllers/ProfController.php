<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfRequest;
use App\Prof;
use App\Matiere;


class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prof = Prof::all();
        return view('Prof.index',compact('prof'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pmatiere = Matiere::pluck('id','nom');
        return view('Prof.create',compact('pmatiere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfRequest $prof)
    {
        Prof::create($prof->all());
        return redirect()->route('prof.index')->with('message','Le prof est Creer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prof $prof)
    {
        return view('Prof.show',compact('prof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prof $prof)
    {
        return view('Prof.edit',compact('prof'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfRequest $request, Prof $prof)
    {
        $prof->update($request->all());
        return redirect()->route('prof.index')->with('message','le prof est mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prof $prof)
    {
        $prof->delete();
        return redirect()->route('prof.index')->with('message', 'le prof est supprimer');
    }
      public function chercher(ProfRequest $request){
        $prof=Prof::where('prenom', '=',$request->search)->first();
        return view('Prof.show',compact('prof'));
    }
}
