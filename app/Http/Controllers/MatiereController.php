<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MatiereRequest;
use App\Etudiant;
use App\Matiere;
use App\Prof;
class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = Matiere::all();
        return view('Matiere.index',compact('matiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prof= Prof::all();
        return view('Matiere.create',compact('prof'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereRequest $matiere)
    {
      $nom=$matiere->Nom;
      $id=$matiere->id_prof;
        Matiere::create(array(
            'Nom' =>$nom ,
            'id_prof' => $id
            ));
      
        return redirect()->route('mat.index')->with('message','matiere est creer qvec le nom'.$matiere->Nom.' et le prof '.$matiere->id_prof);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $mat)
    {
        return view('Matiere.show',compact('mat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $mat)
    {
        $prof=Prof::all();
        return view('Matiere.edit',compact('mat','prof'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatiereRequest $request,Matiere $mat)
    {
        $mat->update($request->all());
        return redirect()->route('mat.index')->with('message','Mise a jour de la matiere est effectué');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $mat)
    {
        $mat->delete();
         return redirect()->route('mat.index')->with('message',' la matiere est supprime');
    }

   
      public function chercher(MatiereRequest $request){
        $mat=Matiere::where('Nom', '=',$request->search)->first();
        return view('Matiere.show',compact('mat'));
    }

    public function remplie(Matiere $mat){
        
        return view('Matiere.remplie',compact('mat'));
    }
    public function rempnote(MatiereRequest $req){
           
        $mat=Matiere::find($req->search);
        $notes =$req->note;
        $i=0;
        $msg="";
        foreach ( $mat->matieres as $etd) {
            if ($notes[$etd->id]!='Pas encore') {
                $mat->matieres()->syncWithoutDetaching([$etd->id =>['note'=>$notes[$etd->id]]]);
                $msg.="\n Affecter ".$notes[$etd->id]." a ".$etd->mail;
                          /* $etd->pivot->note=$notes[$etd->id];
                $etd->save();*/
                $i++;
            }
               
                
            } 
           return redirect()->route('mat.show',['mat'=>$mat->id])->with('message',$msg); 
        }
    }

