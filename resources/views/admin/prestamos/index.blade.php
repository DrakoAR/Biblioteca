@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">

            
            <div class="panel panel-default col-md-12">
                
                <div class="panel-heading">
                    <h3>Prestamos {{route::is('admin.prestamos.vencidos')?'Vencidos':''}}</h3>
                </div>
                
                <div class="panel-body">
                    @if (route::is('admin.prestamos'))
                    <a class="label label-primary" href="{{route('admin.prestamos.vencidos')}}" role="button">Vencidos</a>
                    @endif
                    
                    
                    @if (route::is('admin.prestamos.vencidos'))
                    <a class="label label-primary" href="{{route('admin.prestamos')}}" role="button">Todos</a>
                    @endif

                    
                    <a class="label label-primary" href="{{route('admin.prestamos.topBooks')}}" role="button">Titulos Más Populares</a>
                    
                    <a class="label label-primary" href="{{route('admin.prestamos.topUsers')}}" role="button">Usuarios Más Activos</a>


                </div>
            
            

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Usuario</th>   
                            <th scope="col">Correo</th>   
                            <th scope="col">Fecha incio prestamo</th>
                            <th scope="col">Fecha devolución</th>
                            <th scope="col">Fecha fin prestamo</th>   
                            <th scope="col">Marcar como devuelto</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            {{-- Muestra todos los prestamos --}}
                                @if (Route::is('admin.prestamos'))
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
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td>{{Carbon\Carbon::parse($item->registro_inicio)->format('d-m-y')}}</td>
                                        <td>{{Carbon\Carbon::parse($item->devolucion)->format('d-m-y')}}</td>
                                        @if ($item->registro_fin)
                                        <td>{{Carbon\Carbon::parse($item->registro_fin)->format('d-m-y')}}</td>
                                            @else 
                                                <td> </td>    
                                        @endif
                                        @if ($item->registro_fin)
                                            <td> </td>
                                            @else 
                                            <td>
                                                    <form class="form-horizontal" method="POST" action="{{ route('prestamos.delete', $item->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-success btn-blue">Devolver</button>
                                                        </form>
                                            </td>   
                                        @endif
                                                                        
                                    </tr>  
                                    @endforeach
                                @endif
                                   
                                {{-- muestra solo prestamos vencidos  --}}
                                @if (Route::is('admin.prestamos.vencidos'))
                                    @foreach ($prestamos as $item)
                                    <tr class=
                                    @if ($item->registro_fin!=null)
                                        success
                                    
                                        @elseif(Carbon\Carbon::now()>$item->devolucion) 
                                        danger
                                        @else 
                                        info
                                    @endif>
                                        <td scope="row">{{$item->book->name}}</td>
                                        <td>{{$item->book->autor}}</td>
                                        <td>{{$item->book->referencia}}</td>
                                        <td>{{$item->book->categoria}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td>{{Carbon\Carbon::parse($item->registro_inicio)->format('d-m-y')}}</td>
                                        <td>{{Carbon\Carbon::parse($item->devolucion)->format('d-m-y')}}</td>
                                        @if ($item->registro_fin)
                                        <td>{{Carbon\Carbon::parse($item->registro_fin)->format('d-m-y')}}</td>
                                            @else 
                                                <td> </td>    
                                        @endif
                                        @if ($item->registro_fin)
                                            <td> </td>
                                            @else 
                                            <td>
                                                    <form class="form-horizontal" method="POST" action="{{ route('prestamos.delete', $item->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-success btn-blue">Devolver</button>
                                                        </form>
                                            </td>   
                                        @endif
                                                                        
                                    </tr>  
                                    @endforeach
                                @endif
                        </tbody>
                </table>
            </div>
            {{$prestamos->render()}}
        </div>
    
</div>
@endsection
