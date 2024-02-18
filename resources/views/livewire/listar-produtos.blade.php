<div class="container">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        @if (isset($produtos) && count($produtos) == 0)
            <div class="alert alert-danger" role="alert">
                Nenhum produto cadastrado!
            </div>
        @elseif (isset($produtos) && count($produtos) > 0)
            @foreach ($produtos as $produto)
                @if ($produto->quantidade > 0)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ '/storage/' . $produto->imagem }}" alt="..."
                                style="max-height: 250px; min-height: 250px; width: 250px; display: block; margin: 0 auto;" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->

                                    <h5 class="fw-bolder">{{ $produto->nome }}</h5>


                                    <!-- Product reviews-->

                                    <div class="d-flex justify-content-center small text-danger mb-2">
                                        Em estoque - {{ $produto->quantidade }}
                                    </div>
                                    <!-- Product price-->

                                    R$ {{ $produto->preco }}



                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button class="btn btn-outline-dark mt-auto"
                                        wire:click='addCart({{ $produto->id }})'>
                                        Adicionar ao carrinho
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        @endif
    </div>
</div>
