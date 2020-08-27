@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Prestamos</div>
                
                <div class="panel-body">

                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Referencia</th>
                                <th>Categoría</th>
                                <th>Fecha prestamo</th>
                                <th>Fecha devolución</th>
                                <th>Marcar como devuelto</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                        @foreach ($prestamos as $item)
                                        <tr class=
                                        @if ($item->registro_fin!=null)
                                            success
                                        
                                            @elseif(Carbon\Carbon::now()->toDateString()>$item->devolucion) 
                                            danger
                                            @else 
                                            info
                                        @endif>
                                            <td scope="row">{{$item->book->name}}</td>
                                            <td>{{$item->book->autor}}</td>
                                            <td>{{$item->book->referencia}}</td>
                                            <td>{{$item->book->categoria}}</td>
                                            <td>{{Carbon\Carbon::parse($item->registro_inicio)->format('d-m-Y')}}</td>
                                            <td>{{Carbon\Carbon::parse($item->devolucion)->format('d-m-y')}}</td>
                                            <td>
                                                    <form class="form-horizontal" method="POST" action="{{ route('prestamos.delete', $item->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-success btn-blue">Devolver</button>
                                                        </form>
                                            </td>                                    
                                        </tr>  
                                    @endforeach
                                    
                               
                               
                            </tbody>
                            
                    </table>
                   

                </div>
            </div>
            {{$prestamos->render()}}
        </div>
    </div>
</div>
@endsection
