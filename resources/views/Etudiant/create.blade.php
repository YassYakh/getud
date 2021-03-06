
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Affichage des class</div>

                <div class="panel-body">
                    <h2 class="modal-title" style="text-align: center;">Creation d'un Etudiant  </h2>
                        
                      {!!Form::open(array('route'=>'etd.store'))!!}
                        <div class="form-group">
                            {!!Form::label('nom','Nom') !!} 
                            {!!Form::text('nom',null,['class'=>'form-control']) !!} 
                        </div>        
                         
                         <div class="form-group">
                            {!!Form::label('prenom','Prenom') !!} 
                            {!!Form::text('prenom',null,['class'=>'form-control']) !!} 
                        </div> 

                        <div class="form-group">
                            {!!Form::label('age','Age') !!} 
                            {!!Form::number('age','0',['class'=>'form-control','min'=>'0']) !!} 
                        </div> 

                        <div class="form-group">
                            {!!Form::label('mail','Mail d etudiant') !!} 
                            {!!Form::email('mail',null,array('placeholder'=>'mail@mail.com','class'=>'form-control'))  !!} 
                        </div>    

                        <div class="form-group">
                        {!!Form::label('M','Matieres') !!}<br>
                            @foreach ($matiere as $mat)
                                <div class="col-lg-2">
                                {{ Form::checkbox("M[]", $mat->id) }}   {!!Form::label('M',$mat->Nom) !!}
                                </div>
                            @endforeach
                        </div>
                        <br>

                        {!! Form::button('create',['type'=>'submit','class'=>'btn btn-success'])!!}    
                        
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
