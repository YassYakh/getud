
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Affichage des class</div>

                <div class="panel-body">
                    <h2 class="modal-title" style="text-align: center;">Modifier l'Etudiant  </h2>
                        
                      
                      {!! Form::model($etd,array('route'=>['etd.update',$etd->id],'method'=>'PUT'
                  )) !!}
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
                            {!!Form::number('age',null,['class'=>'form-control','min'=>'0']) !!} 
                        </div> 

                        <div class="form-group">
                            {!!Form::label('mail','Mail d etudiant') !!} 
                            {!!Form::email('mail',null,array('placeholder'=>'mail@mail.com','class'=>'form-control'))  !!} 
                        </div>    

                        <div class="form-group">
                        {!!Form::label('M','Matieres') !!}<br>

                                      <!-- Si l etudiant a deja des matieres !-->                    
                                    @if (count($etd->matieres)>0)
                                        
                                   
                                      @foreach ($matiere as $mat)  
                                       <?php $find = 0; ?>                          
                                        @foreach ($etd->matieres as $m)
                                         

                                               @if ($mat->id==$m->id)
                                                    <div class="col-lg-2"> 
                                                  
                                                  {{ Form::checkbox("M[]", $mat->id,true) }}   {!!Form::label('M',$mat->Nom) !!}
                                                   </div>
                                                  <?php $find = 1; ?>
                                               
                                              @endif
                                             
                                        @endforeach
                                            @if ($find==0)
                                                  
                                              <div class="col-lg-2"> 
                                                  
                                                  {{ Form::checkbox("M[]", $mat->id) }}   {!!Form::label('M',$mat->Nom) !!}
                                                   </div>
                                            @endif 
                                       @endforeach
                                   

                                    @else
                                        @foreach ($matiere as $mat)
                                           
                                                <div class="col-lg-2"> 
                                                    {{ Form::checkbox("M[]", $mat->id) }}   {!!Form::label('M',$mat->Nom) !!}
                                                </div>
                                          
                                        @endforeach
                                    @endif
                                       
                                </div>
                                        

                           
                        </div>
                        <br>

                        {!! Form::button('update',['type'=>'submit','class'=>'btn btn-success'])!!}    
                        
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
