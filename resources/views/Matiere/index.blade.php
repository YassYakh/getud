@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
         @if (Session::has('message'))
             <div class="alert alert-success">
                 {{Session::get('message')}}
             </div>
         @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                 <p class="col-lg-6">Espace Matieres</p>
                    {!! Form::open(['method'=>'GET','action' =>'MatiereController@chercher','role'=>'search'])  !!}  

                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Nom matiere">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!} 

                </div>

                <div class="panel-body">
                    <h2 class="modal-title" style="text-align: center;">Liste des Prof</h2>
                           
                    @if (count($matiere)!=0)
                       
                    <table class="table">
                       <thead><th>Matiere</th><th>Prof</th></thead>
                        @foreach ($matiere as $mat)
                            <tr> 
                                <td>{!! link_to_route('mat.show',$mat->Nom,[$mat->id],['class'=>'btn btn-link'])!!}</td>
                                <td>
                                        @if (count($mat->profs)==0)
                                            <strong style="color: red">Aucun prof affecter</strong>
                                        @else
                                             {{ $mat->profs->prenom}}
                                        @endif
                                      
                                
                                </td>

                                <td>
                                    {!! Form::open(array('route'=>['mat.destroy',$mat],'method'=>'DELETE'))!!}
                                    {!! link_to_route('mat.edit','Modifier',[$mat->id],['class'=>'btn btn-primary'])!!}
                                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit'])!!}
                                    {!!Form::close()!!} 
                                </td>
                            </tr>
                        @endforeach
                      
                    </table>
                    @else
                       <span class=" alert alert-warning col-lg-12" style="text-align: center;"> La liste est vide </span>
                    @endif

                     {!! link_to_route('mat.create','Creer une matiere',null,['class'=>'btn btn-link'])!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  

    