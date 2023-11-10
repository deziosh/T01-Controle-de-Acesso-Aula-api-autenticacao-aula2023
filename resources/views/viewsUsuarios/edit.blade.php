<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Senha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->
        <form method="post" action="{{ route('usuarios.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="password" class="">Insira a nova senha</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <button class="btn btn-primary">Salvar</button>
            <button class="btn btn-secondary">
                <a href="{{route('papeis.index')}}">Voltar</a>
            </button>
        </form>
        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>
