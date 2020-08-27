@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Prestamo</div>

                <div class="panel-body">

                    
                    <form class="form-horizontal" method="POST" action='{{ route("prestamos.store") }}'>
                        {{ csrf_field() }}

                        <input type="hidden" name="book_id" value={{$book->id}}>
                        <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                        <input type="hidden" name="registro_inicio" value={{$fecha}}>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                    <input id="name" type="string" class="form-control" name="name" value= '{{$book->name}}' required readOnly>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('autor') ? ' has-error' : '' }}">
                                <label for="autor" class="col-md-4 control-label">Autor</label>
    
                                <div class="col-md-6">
                                    <input id="autor" type="string" class="form-control" name="autor" value='{{$book->autor}}' required readOnly>
    
                                    @if ($errors->has('autor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('autor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                            <label for="referencia" class="col-md-4 control-label">Código de Referencia</label>

                            <div class="col-md-6">
                                <input id="referencia" type="string" class="form-control" name="referencia" value={{$book->referencia}} required readOnly>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                            
                                <label for="categoria" class="col-md-4 control-label">Categoría</label>
                                <div class="col-md-6">
                                <input id="categoria" type="string" class="form-control" name="categoria" value= {{$book->categoria}} required readOnly>
                               
                            
                                @if ($errors->has('categoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('año') ? ' has-error' : '' }}">
                            
                                <label for="año" class="col-md-4 control-label">Año</label>
                                <div class="col-md-6">
                                <input id="año" type="string" class="form-control" name="año" value= {{$book->año}} required readOnly>
                               
                            
                                @if ($errors->has('año'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('año') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>

                       @if ($book->volumen)
                       <div class="form-group{{ $errors->has('volumen') ? ' has-error' : '' }}">
                            
                        <label for="volumen" class="col-md-4 control-label">Volumen</label>
                        <div class="col-md-6">
                        <input id="volumen" type="string" class="form-control" name="volumen" value= {{$book->volumen}} required readOnly>
                       
                    
                        @if ($errors->has('volumen'))
                            <span class="help-block">
                                <strong>{{ $errors->first('volumen') }}</strong>
                            </span>
                        @endif
                        </div>
                    
                </div>
                       @endif

                        <div class="form-group{{ $errors->has('devolucion') ? ' has-error' : '' }}">
                            
                                <label for="devolucion" class="col-md-4 control-label">Devolución</label>
                                <div class="col-md-6">
                                <input id="devolucion" type="date" class="form-control" name="devolucion" value= {{Carbon\Carbon::now()}} min={{Carbon\Carbon::now()}} required >
                               
                            
                                @if ($errors->has('devolucion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('devolucion') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>
                        


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
