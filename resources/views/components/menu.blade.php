<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid" id="header">

			<a class="navbar-brand" href="{{ url('/') }} " style="margin-left: auto;">
				<img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="width: 250px; height: 80px;">
				{{-- {{env('APP_NAME')}} --}}
			</a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
				<form class="d-flex" id="search_form">
					<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" id="search_input">
					<button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Inicio de sesión</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @role('admin')
                            {{-- user --}}
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    Usuarios
                                </a>
                            @endrole

                            @role('admin|user')
                            {{-- Product --}}
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    Productos
                                </a>
                            @endrole

                            @can('categories.index')
                            {{-- Category --}}
                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    Categorias
                                </a>
                            @endcan

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
{{-- <script>
            document.addEventListener("DOMContentLoaded", loadDatatable);

            function loadDatatable(){
                $('#search_table').DataTable({
					"searching": true
				});
            }
</script> --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#search_form').submit(function(e) {
                e.preventDefault();
                var searchTerm = $('#search_input').val();
                $('#products_table').DataTable().search(searchTerm).draw();
            });
        });
    </script>
@endsection

