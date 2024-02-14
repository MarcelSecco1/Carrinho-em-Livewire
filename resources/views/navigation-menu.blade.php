<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-dark text-white">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">E-Commerce do Marcel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>

                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item text-white "><a class="nav-link"
                                    href="{{ route('register') }}">Registrar</a></li>
                        @endif
                    @endauth

                @endif
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
            @auth
                <button class="btn btn-outline-danger ms-4" type="submit">
                    <i class="bi bi-x-circle"></i>
                    Sair
                </button>
            @endauth

        </div>
    </div>
</nav>
