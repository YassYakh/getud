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
                 <p class="col-lg-6">Espace Etudiant</p>
                    {!! Form::open(['method'=>'GET','action' =>'ProfController@chercher','role'=>'search'])  !!}  

                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Prenom de l'etudiant">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                </div>

                <div class="panel-body">
                    <h2 class="modal-title" style="text-align: center;">Liste des Etudiants</h2>
                    @if (count($etd)!=0)
                       
                    <table class="table">
                       <thead><th>nom</th><th>prenom</th><th>age</th><th>mail</th><th>Operation</th></thead>
                        @foreach ($etd as $et)
                            <tr> 
                                <td>{!! link_to_route('etd.show',$et->nom,[$et->id],['class'=>'btn btn-link'])!!}</td>
                                <td>{{$et->prenom}}</td>
                                <td>{{$et->age}}</td>
                                <td>{{$et->mail}}</td> 
                                <td>
                                    {!! Form::open(array('route'=>['etd.destroy',$et->id],'method'=>'DELETE'))!!}
                                    {!! link_to_route('etd.edit','Modifier',[$et->id],['class'=>'btn btn-primary'])!!}
                                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit'])!!}
                                    {!!Form::close()!!} 
                                </td>
                            </tr>
                        @endforeach
                      
                    </table>
                    @else
                       <span class=" alert alert-warning col-lg-12" style="text-align: center;"> La liste est vide </span>
                    @endif

                     {!! link_to_route('etd.create','Creer un etudiant',null,['class'=>'btn btn-link'])!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  

    