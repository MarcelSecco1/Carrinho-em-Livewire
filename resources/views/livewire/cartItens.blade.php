<div>
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

        <span class="badge rounded-pill text-bg-light">{{ $quantiaItens }}</span>
        <i class="bi-cart-fill me-1"></i>
        Carrinho
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Meu carrinho</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        @if ($produtosInCart)
                            @foreach ($produtosInCart as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->nome }}
                                    <span
                                        class="badge bg-primary rounded-pill">{{ session('produto' . $item->id) }}</span>
                                </li>
                            @endforeach
                        @else
                            <div class="alert alert-danger">
                                <span>Não há itens em seu carrinho!!</span>
                            </div>
                        @endif
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continuar
                        comprando</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        wire:click='clearCart'>Limpar</button>
                    <button type="button" class="btn btn-primary">Finalizar</button>
                </div>
            </div>
        </div>
    </div>

</div>
@script
    <script>
        $wire.on('clear-cart', ($message) => {
            Swal.fire({
                title: "Bom trabalho!",
                text: $message,
                icon: "success"
            });
        });
        $wire.on('item-adicionado', ($message) => {
            const toastLiveExample = document.getElementById('liveToast')
            const body = document.getElementById('mensagem')
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            body.classList.add('text-success')
            body.innerHTML = $message;
            toastBootstrap.show()
        });

        $wire.on('no-have-itens', ($message) => {
            const toastLiveExample = document.getElementById('liveToast')
            const body = document.getElementById('mensagem')
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            body.classList.add('text-danger')
            body.innerHTML = $message;
            toastBootstrap.show()
        });
    </script>
@endscript
