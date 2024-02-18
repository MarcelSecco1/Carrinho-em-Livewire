<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-Commerce do Marcel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    @livewireStyles
</head>


<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active text-white" aria-current="page"
                            href="{{ route('home') }}">Inicio</a></li>


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a class="nav-link text-white" aria-current="page"
                                    href="{{ route('create.product') }}">Cadastrar Produto</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Entrar</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item "><a class="nav-link text-white"
                                        href="{{ route('register') }}">Registrar</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
                @livewire('cartItens')
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="btn btn-outline-danger ms-4" type='submit'>
                            <i class="bi bi-x-circle"></i>
                            Sair
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>


    <!-- Section-->
    <div>
        {{ $slot }}
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notificação!</strong>
                <small></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body ">
                <span id='mensagem'>
                </span>
            </div>
        </div>
    </div>



    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Marcel Secco 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    {{-- alpine plugin --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
</body>

</html>
