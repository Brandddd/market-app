{{-- Menu --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand font-" href="{{ url('/') }}">
            <strong>MARKET ACCEDO</strong>
            <i class="fa-solid fa-shop"></i>
        </a>

        {{-- - Burguer Button - --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif
                @else
                    {{-- Carrito --}}
                    <a class="nav-link" href="{{ route('list-cart') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Carrito de compras
                    </a>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-user-check"></i>
                            {{ Auth::user()->full_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @role('admin')
                                {{-- Productos --}}
                                <a class="dropdown-item" href="{{ route('products') }}">
                                    <i class="fa-solid fa-list-check"></i>
                                    Gestión de productos
                                </a>

                                {{-- Usuarios --}}
                                <a class="dropdown-item" href="{{ route('users') }}">
                                    <i class="fa-solid fa-users"></i>
                                    Gestión de usuarios
                                </a>

                                {{-- Categorías --}}
                                <a class="dropdown-item" href="{{ route('categories') }}">
                                    <i class="fa-solid fa-clipboard-check"></i>
                                    Gestión de categorías
                                </a>
								@endrole

                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Salir
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
