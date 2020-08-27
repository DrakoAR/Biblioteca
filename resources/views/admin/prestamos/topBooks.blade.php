@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">

            
            <div class="panel panel-default col-md-12">
                
                <div class="panel-heading">
                    <h3>Títulos Más Populares {{route::is('admin.prestamos.vencidos')?'Vencidos':''}}</h3>
                </div>
                
                <div class="panel-body">

                    {{-- <a class="btn btn-blue pull-left" href="{{ url()->previous() }}
                            " role="button"> Volver  </a> --}}
                      
                    <a class="label label-primary" href="{{route('admin.prestamos')}}" role="button">Prestamos</a>
                            

                </div>
            
            

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Veces Prestado</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                                    @foreach ($prestamos as $item)
                                    <tr class="info">
                                   
                                        <td scope="row">{{$item->book->name}}</td>
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
