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
                 <p class="col-lg-6">Espace Prof</p>
                    {!! Form::open(['method'=>'GET','action' =>'ProfController@chercher','role'=>'search'])  !!}  

                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Prenom de prof">
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
                    @if (count($prof)!=0)
                       
                    <table class="table">
                       <thead><th>nom</th><th>prenom</th><th>age</th><th>mail</th><th>Operation</th></thead>
                        @foreach ($prof as $pr)
                            <tr> 
                                <td>{!! link_to_route('prof.show',$pr->nom,[$pr->id],['class'=>'btn btn-link'])!!}</td>
                                <td>{{$pr->prenom}}</td>
                                <td>{{$pr->age}}</td>
                                <td>{{$pr->mail}}</td> 
                                <td>
                                    {!! Form::open(array('route'=>['prof.destroy',$pr->id],'method'=>'DELETE'))!!}
                                    {!! link_to_route('prof.edit','Modifier',[$pr->id],['class'=>'btn btn-primary'])!!}
                                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit'])!!}
                                    {!!Form::close()!!} 
                                </td>
                            </tr>
                        @endforeach
                      
                    </table>
                    @else
                       <span class=" alert alert-warning col-lg-12" style="text-align: center;"> La liste est vide </span>
                    @endif

                     {!! link_to_route('prof.create','Creer un prof',null,['class'=>'btn btn-link'])!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  

    