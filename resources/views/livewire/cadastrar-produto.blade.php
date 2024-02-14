<div style="min-height: 100vh" class="d-flex justify-content-center mt-5">

    <form class="col-md-4" wire:submit.prevent='cadastrar' method="POST" enctype="multipart/form-data">
        @csrf
        <h3 class="text-center mb-4">Cadastrar Produto</h3>
        @if (session()->has('message'))
            <div class="alert alert-success ps-3 pe-3 text-center">
                {{ session('message') }}
            </div>
        @else
            @if (session()->has('error'))
                <div class="alert alert-danger ps-3 pe-3 text-center">
                    {{ session('error') }}
                </div>
            @endif

        @endif
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" wire:model="nome">
            @error('nome')
                <span class="error text-bg-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="qtd" class="form-label">Quantidade disponível:</label>
            <input type="number" class="form-control" id="quantidade" wire:model="quantidade">
            @error('quantidade')
                <span class="error text-bg-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3" x-data="{}">
            <label for="qtd" class="form-label">Preço:</label>
            <input x-mask:dynamic="$money($input)" type="text" class="form-control" id="preco"
                wire:model="preco">
            @error('qtprecod')
                <span class="error text-bg-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="promo" class="form-label">Promoção?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model.live="promocao" id="promoYes" value="1">
                <label class="form-check-label" for="flexRadioDefault1" class="me-5">
                    Sim
                </label>
                @error('promocao')
                    <span class="error text-bg-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input checked" type="radio" wire:model.live="promocao" id="promoNo"
                    value="0">
                <label class="form-check-label" for="flexRadioDefault2" class="ms-5">
                    Não
                </label>
            </div>
            <div class="mb-3 mt-3">
                @if ($promocao)
                    <label for="desconto" class="form-label">Quantos %?</label>
                    <input type="number" class="form-control" id="desconto" name="desconto" wire:model="desconto">
                @else
                    <label for="desconto" class="form-label">Quantos %?</label>
                    <input type="number" class="form-control" id="desconto" name="desconto" disabled>
                @endif

                @error('desconto')
                    <span class="error text-bg-danger">{{ $message }}</span>
                @enderror

            </div>
            @if ($imagem)
                <img src="{{ $imagem->temporaryUrl() }}" class="rounded mx-auto d-block" width='250' heigth='250'>
            @endif
            <div class="mb-3">
                <label for="file" class="form-label">Imagem:</label>
                <input type="file" class="form-control mb-3" id="file" name="imagem" wire:model="imagem">
                @error('imagem')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="d-flex justify-content-between ">
            <button type="submit" class="btn btn-primary w-50 me-2">Cadastrar</button>
            <button type="reset" class="btn btn-danger w-50 ms-2">Limpar</button>
        </div>
    </form>
</div>
