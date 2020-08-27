@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">

            
            <div class="panel panel-default col-md-12">
                
                <div class="panel-heading">
                    <h3>Usuarios Más Activos</h3>
                </div>
                
                <div class="panel-body">

                    {{-- <a class="btn btn-blue pull-left" href="{{ url()->previous() }}
                            " role="button"> Volver  </a> --}}
                      
                    <a class="label label-primary" href="{{route('admin.prestamos')}}" role="button">Prestamos</a>
                            

                </div>
            
            

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Prestamos Realizados</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                                    @foreach ($prestamos as $item)
                                    <tr class="info">
                                   
                                        <td scope="row">{{$item->user->name}}</td>
                                        <td scope="row">{{$item->count}}</td>
                                                                        
                                    </tr>  
                                    @endforeach
                        </tbody>
                </table>
            </div>
            {{$prestamos->render()}}
        </div>
    
</div>
@endsection
