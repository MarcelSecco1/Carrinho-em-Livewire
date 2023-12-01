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
            <label for="qtd" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" wire:model="quantidade">
            @error('quantidade')
                <span class="error text-bg-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="qtd" class="form-label">Preço:</label>
            <input type="number" class="form-control" id="preco" wire:model="preco">
            @error('qtprecod')
                <span class="error text-bg-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="promo" class="form-label">Promoção?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="promocao" id="promoYes" value="true">
                <label class="form-check-label" for="flexRadioDefault1" class="me-5">
                    Sim
                </label>
                @error('promocao')
                    <span class="error text-bg-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="promocao" id="promoNo" checked
                    value="false">
                <label class="form-check-label" for="flexRadioDefault2" class="ms-5">
                    Não
                </label>
            </div>
            <div class="mb-3 mt-3">
                <label for="desconto" class="form-label">Quantos %?</label>
                <input type="number" class="form-control" id="desconto" name="desconto" disabled
                    wire:model="desconto">
                @error('desconto')
                    <span class="error text-bg-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="file" name="imagem" wire:model="imagem">
                @error('imagem')
                    <span class="error text-bg-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
    </form>
</div>
