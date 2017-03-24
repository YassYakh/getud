
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Etudiant</div>

                <div class="panel-body">
                   @if (count($etd)!=0)
                        <div class="col-lg-6">
                             <h2 class="modal-title" style="text-align: center;">Information personnels </h2>
                          
                             <table class="table">                        
                                <tr> <td class="info">Nom</td> <td class="warning">   {{ $etd->nom}}</td> </tr>
                                <tr> <td class="info">Prenom</td> <td class="warning">{{ $etd->prenom}}</td> </tr>
                                <tr> <td class="info">Age</td> <td class="warning">   {{ $etd->age}}</td> </tr>
                                <tr> <td class="info">Mail</td> <td class="warning">  {{ $etd->mail}}</td> </tr>
                              
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="modal-title" style="text-align: center;">Liste des Class  </h2>

                                @if (count($etd->matieres)==0)
                                   <h4 class="alert alert-danger"> 
                                   <span class="glyphicon glyphicon-ban-circle"></span>
                                   Aucune matiere est affecté au professeur
                                   </h4>
                                @else
                                    <table class="table">
                                       <thead><th>id</th><th>Nom matiere</th><th>Prof</th><th>Note</th></thead>
                                       @foreach ($etd->matieres as $mat)
                                            <tr> 
                                                <td class="info">{{$mat->id}}</td>
                                                <td>{{$mat->Nom}}</td>
                                                <td class="warning">{{$mat->profs->nom.' '.$mat->profs->prenom}}</td>
                                                @if ($mat->pivot->note)
                                                  <td class="affix">{{$mat->pivot->note}}</td>
                                                @else 
                                                  <td style="color: red">  Pas encore </td>
                                                @endif
                                                

                                            </tr>
                                       @endforeach
                                    </table>
                                @endif
                    

                        </div>

                    @else
                         <h4 class="alert alert-danger"><span class="glyphicon glyphicon-hand-right"></span>  Aucune matiere est affecté au professeur</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
