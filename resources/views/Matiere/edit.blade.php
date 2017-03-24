
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Matiere</div>

                <div class="panel-body">
                    <h2 class="modal-title" style="text-align: center;">Modification d'une Matiere</h2>
                        
                      
                     {!! Form::model($mat,array('route'=>['mat.update',$mat->id],'method'=>'PUT')) !!}
                        <div class="form-group">
                            {!!Form::label('Nom','Nom de la matiere') !!} 
                            {!!Form::text('Nom',null,['class'=>'form-control']) !!} 
                        </div>        
                         
                         <div class="form-group">
                         {!!Form::label('id_prof','Prof de la matiere') !!} 
                       <select name="id_prof" class="form-control">
                            @foreach ($prof as $prf)
                                @if ($prf->id==$mat->profs->id)
                                    <option value={{$prf->id}} selected> {{$prf->nom." ".$prf->prenom."  :".$prf->mail}}</option>
                                @else
                                    <option value={{$prf->id}}> {{$prf->nom." ".$prf->prenom."  :".$prf->mail}}</option>
                                @endif
                                
                            @endforeach
                                
                            </select> 
                            
                        </div> 
                

                        {!! Form::button('Modifier',['type'=>'submit','class'=>'btn btn-success'])!!}    

                            </div>
                        {!!Form::close() !!}
                     
                </div>

                   @if ($errors->has())
                <ul class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach 

                </ul>
            @endif
            </div>

         
        </div>
    </div>
</div>
@endsection
