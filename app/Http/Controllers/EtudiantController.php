<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EtudiantRequest;
use App\Etudiant;
use App\Matiere;
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $etd = Etudiant::all();
        return view('Etudiant.index',compact('etd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matiere= Matiere::all();

        return view('Etudiant.create',compact('matiere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtudiantRequest $etd)
    {
        $etudiant = Etudiant::create([
                                'nom'   =>$etd->nom,
                                'prenom'=>$etd->prenom,
                                'age'=>$etd->age,
                                'mail'=>$etd->mail
                                ]);
        $etudiant->matieres()->attach($etd->M);
        return redirect()->route('etd.index')->with('message','Etudiant est creer matiere ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etd)
    {
        return view('Etudiant.show',compact('etd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etd)
    {
        $matiere=Matiere::all();
        return view('Etudiant.edit',compact('etd','matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtudiantRequest $request,Etudiant $etd)
    {
        $etd->update([
                                'nom'   =>$request->nom,
                                'prenom'=>$request->prenom,
                                'age'=>$request->age,
                                'mail'=>$request->mail]);


        $etd->matieres()->sync($request->M);
        return redirect()->route('etd.index')->with('message','update reussit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etd)
    {
        $etd->delete();
        return redirect()->route('etd.index')->with('message','Etudiant est supprimer');
    }
}
