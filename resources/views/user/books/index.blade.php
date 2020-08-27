@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (route::is('lista'))
                        Todas
                    @endif
                    @if (route::is('listaLibros'))
                        Libros
                    @endif
                    @if (route::is('listaRevistas'))
                        Revistas
                    @endif
                    @if (route::is('listaTesis'))
                        Tesis
                    @endif
                    @if (route::is('listaActas'))
                        Actas
                    @endif
                </div>
                
                @if (Auth::check() && Auth::user()->isAdmin())

                <div class="panel-body">
                    <a class="btn btn-blue pull-left" href="{{route('book.create')}}" role="button">  <i class="fa fa-plus" aria-hidden="true" style="padding-right:5px">  </i>Nuevo Título</a>
                   

                </div>
                @endif
                

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Año</th>
                            <th>Volumen</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                                    @foreach ($ejemplares as $item)
                                    <tr>
                                        <td scope="row">{{$item->name}}</td>
                                        <td>{{$item->autor}}</td>
                                        <td>{{$item->cantidad}}</td>
                                        <td>{{$item->categoria}}</td>
                                        <td>{{$item->año}}</td>
                                        <td>{{$item->volumen}}</td>
                                        
                                    <td>
                                        <a class="btn btn-blue pull-left" href="{{route('prestamos.create', $item->id)}}" role="button">  <i class="fa fa-plus-square" aria-hidden="true" style="padding-right:5px">  </i>Solicitar   </a>
                                            {{-- <a href="{{route('prestamos.create', $item->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-check-square"> Solicitar</i></a>  --}}
                                    </td>
                                            
                                    {{-- Boton edit solo para admin --}}
                                    @if (Auth::user()->isAdmin())
                                    <td>
                                        <a class="btn btn-blue pull-left" href="{{route('book.edit', $item->id)}}" role="button">  <i class="fa fa-pencil" aria-hidden="true" style="padding-right:5px">  </i>Editar  </a>
                                    </td>
                                    <td>
                                            <a class="btn btn-blue pull-left" href="{{route('book.delete', $item->id)}}" role="button">  <i class="fa fa-minus-square" aria-hidden="true" style="padding-right:5px">  </i>Eliminar  </a>
                                    </td>    
                                    @endif
                                    
                                    </tr>  
                                @endforeach
                                
                           
                           
                        </tbody>
                </table>
            </div>
            {{$ejemplares->render()}}
        </div>
    </div>
</div>
@endsection
