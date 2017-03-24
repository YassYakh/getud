
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Affichage des class</div>

                <div class="panel-body">
                   @if (count($prof)!=0)
                        <div class="col-lg-6">
                             <h2 class="modal-title" style="text-align: center;">Information personnels </h2>
                          
                             <table class="table">                        
                                <tr> <td class="info">Nom</td> <td class="warning">   {{ $prof->nom}}</td> </tr>
                                <tr> <td class="info">Prenom</td> <td class="warning">{{ $prof->prenom}}</td> </tr>
                                <tr> <td class="info">Age</td> <td class="warning">   {{ $prof->age}}</td> </tr>
                                <tr> <td class="info">Mail</td> <td class="warning">  {{ $prof->mail}}</td> </tr>
                              
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="modal-title" style="text-align: center;">Liste des Class  </h2>

                                @if (count($prof->matieres)==0)
                                   <h4 class="alert alert-danger"> 
                                   <span class="glyphicon glyphicon-ban-circle"></span>
                                   Aucune matiere est affecté au professeur
                                   </h4>
                                @else
                                    <table class="table">
                                       <thead><th>id</th><th>Nom matiere</th></thead>
                                       @foreach ($prof->matieres as $mat)
                                             <tr> 
                                                <td class="info">{{$mat->id}}</td><td>{{$mat->Nom}}</td>
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
