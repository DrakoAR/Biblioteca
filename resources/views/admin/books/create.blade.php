@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Nuevo Titulo</div>

                <div class="panel-body">

                 
                    <form class="form-horizontal" method="POST" action="{{ route('book.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Titulo*</label>

                            <div class="col-md-6">
                            <input id="name" type="string" class="form-control" name="name" value='{{old('name')}}'  >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('autor') ? ' has-error' : '' }}">
                                <label for="autor" class="col-md-4 control-label">Autor*</label>
    
                                <div class="col-md-6">
                                <input id="autor" type="string" class="form-control" name="autor" value='{{old('autor')}}'  >
    
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
                                <select name="referencia" class="form-control">
                                    <option value="L1A">L1A</option>
                                    <option value="L1B">L1B</option>
                                    <option value="L1C">L1C</option>
                                    <option value="L1D">L1D</option>
                                    <option value="L1F">L1F</option>
                                  </select>
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
                                    <select name="categoria" class="form-control">
                                        <option value="revistas">Revistas</option>
                                        <option value="libros">Libros</option>
                                        <option value="actas">Actas</option>
                                        <option value="tesis">Tesis</option>
                                      </select>
                            
                                @if ($errors->has('categoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('año') ? ' has-error' : '' }}">
                            
                                <label for="año" class="col-md-4 control-label">Año*</label>
                                <div class="col-md-6">
                                <input id="año" type="number" class="form-control" name="año" value='{{old('año')}}'  >
                               
                            
                                @if ($errors->has('año'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('año') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            
                                <label for="cantidad" class="col-md-4 control-label">Cantidad*</label>
                                <div class="col-md-6">
                                <input id="cantidad" type="number" class="form-control" name="cantidad" value='{{old('cantidad')}}'  >
                               
                            
                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                                </div>
                            
                        </div>

                       
                       <div class="form-group{{ $errors->has('volumen') ? ' has-error' : '' }}">
                            
                        <label for="volumen" class="col-md-4 control-label">Volumen</label>
                        <div class="col-md-6">
                        <input id="volumen" type="number" class="form-control" name="volumen" value='{{old('volumen')}}'  >
                       
                    
                        @if ($errors->has('volumen'))
                            <span class="help-block">
                                <strong>{{ $errors->first('volumen') }}</strong>
                            </span>
                        @endif
                        </div>
                    
                        </div>
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Agregar
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
