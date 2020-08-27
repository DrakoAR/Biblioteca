<!-- Footer -->
<footer class=" container ">

  <hr class="clearfix">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
      
      <!-- Grid row -->
      <div class="row">
  
        <!-- Grid column -->
        <div class="@if (Auth::user())
        col-md-6
        @else
        col-md-12
        @endif">
  
          <!-- Content -->
         
        <img class="logo img-responsive center-block " src="{{asset('img/isologo_unsl_color_footer.png')}}" alt="">
  
        </div>
        <!-- Grid column -->
  
        
        @if (Auth::user())
        @if (Auth::user()->isAdmin())
            <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
  
            <!-- Links -->
            <h5 class="text-uppercase">Prestamos</h5>
    
            <ul class="list-unstyled">
              <li>
                <a href="{{route('admin.prestamos')}}">Todos</a>
              </li>
              <li>
                <a href="{{route('admin.prestamos.vencidos')}}">Vencidos</a>
              </li>
              <li>
                <a href="{{route('admin.prestamos.topBooks')}}">Títulos Más Populares</a>
              </li>
              <li>
                <a href="{{route('admin.prestamos.topUsers')}}">Usuarios Más Activos</a>
              </li>
            </ul>
    
          </div>
          <!-- Grid column -->
        @endif
            
  
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
  
          <!-- Links -->
          <h5 class="text-uppercase">Categorías</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="{{route('lista')}}">Todas</a>
            </li>
            <li>
              <a href="{{route('listaLibros')}}">Libros</a>
            </li>
            <li>
              <a href="{{route('listaRevistas')}}">Revistas</a>
            </li>
            <li>
              <a href="{{route('listaTesis')}}">Tesis</a>
            </li>
            <li>
              <a href="{{route('listaActas')}}">Actas</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
        @endif
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class=" text-center text-capitalize">© 2019 Copyright: Desarrolado Por Ricardo Romero como trabajo final
      de la carrera Tecnicatura Universitaria en Web.
      
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->