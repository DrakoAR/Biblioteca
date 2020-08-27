@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Busqueda Avanzada</div>

                <div class="panel-body">

                    
                    <form class="form-horizontal" method="GET" action='{{ route("busqueda") }}'>
                        {{ csrf_field() }}

                        
                        <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Título</label>
                                <div class="col-md-6">

                                    <input name="name"type="text" class="form-control" placeholder="Ingrese Titulo">
                                </div>
                            </div>

                            
                            <div class="form-group">
                                
                                <label for="autor" class="col-md-4 control-label">Autor</label>
                                <div class="col-md-6">

                                    <input name="autor"type="text" class="form-control" placeholder="Ingrese Autor">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <label for="categoria" class="col-md-4 control-label">Categoria</label>
                                <div class="col-md-6">

                                    <select name="categoria" class="form-control">
                                                <option value="revistas">Revistas</option>
                                                <option value="libros">Libros</option>
                                                <option value="actas">Actas</option>
                                                <option value="tesis">Tesis</option>
                                    </select>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="año" class="col-md-4 control-label">Año</label>
                                <div class="col-md-6">

                                    <input name="año"type="number" class="form-control" placeholder="Ingrese Año">
                                </div>
                            </div>

                            <div class="form-group">
                                
                                    <label for="volumen" class="col-md-4 control-label">Volumen</label>
                                    <div class="col-md-6">
    
                                        <input name="volumen"type="text" class="form-control" placeholder="Ingrese Volumen">
                                    </div>
                                </div>
                            
                        <button type="submit" class="btn btn-default btn-blue center-block">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
