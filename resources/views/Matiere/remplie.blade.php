
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Affichage des class</div>

                <div class="panel-body">
                     @if (count($mat)==0)
                             <h4 class="alert alert-danger"> 
                                   <span class="glyphicon glyphicon-ban-circle"></span>
                                   Matiere n existe pas{!! link_to_route('mat.show','Go back',null,['class'=>'btn btn-link'])!!}
                                   </h4>
                     @else      
                        <div class="col-lg-6">
                            <h2 class="modal-title" style="text-align: center;"> Matiere </h2>

                             
                                    <table class="table">
                                       <thead><th>id</th><th>Matiere</th></thead>
                                       
                                             <tr> 
                                                <td class="info">{{$mat->id}}</td><td>{{$mat->Nom}}</td>
                                              </tr>
                                    </table>
                         </div>
                       
                        
                         <div style="align-content: center;"> 

                             <h2 class="modal-title" style="text-align: center;">Liste des etudiants</h2> 
                         @if (count($mat->matieres)==0)
                             <h4 class="alert alert-danger"> 
                                   <span class="glyphicon glyphicon-ban-circle"></span>
                                   Aucune Prof est affecter a cette matiere
                                   </h4>
                          @else 
                          {!! Form::open(['method'=>'GET','route' =>'mat.rempnote'])  !!}  

                          <table class="table"> 


                           
                         <thead><th>Nom</th><th>Prenom</th><th>Age</th><th>Mail</th> <th>Note</th></thead>
                              @foreach ($mat->matieres as $etd)                       
                                <tr> <td>  {{ $etd->nom   }}</td> 
                                     <td>  {{ $etd->prenom}}</td> 
                                     <td>  {{ $etd->age   }} </td> 
                                     <td>  {{ $etd->mail  }}</td> 
                                   @if ($etd->pivot->note)
                                      <td>
                                          <div class="input-group ">
                                          <input type="text" class="form-control" name="note[{{ $etd->id  }}]" value="{{ $etd->pivot->note  }}" >
                                      </td>
                                   @else 
                                      <td style="color: red"> 
                                          <input type="text" class="form-control" name="note[{{ $etd->id  }}]" value="Pas encore" >
                                      
                                       </td>
                                    @endif
                                    
                                </tr>
                              @endforeach


                            </table>
                             <input type="hidden" name="search" value="{{$mat->id}}">
                             <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!} 
                          
                   @if ($errors->has())
                <ul class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach 

                </ul>
            @endif
                        @endif
                        </div>
                        @endif
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
