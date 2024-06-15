<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl mb-10">Editar o produto: {{ $produto->nome }}</h1>

                        <form method="post" action="{{ route('produtos.update',['produto' => $produto->id]) }}">
                        @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <h1 class="mt-10">Edite o produto:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="text" name="nome" value="{{ $produto->nome }}">
                            
                            <h1 class="mt-10">Quantidade dos produtos:</h1>
                            <input min="0" max="100000" class=" w-64 h-10 mt-2 text-black rounded-lg" type="number" name="quantidade" value="{{ $produto->quantidade }}">

                            <h1 class="mt-10">Preço total dos produtos:</h1>
                            <input min="0" max="100000" class=" w-64 h-10 mt-2 text-black rounded-lg" type="number"
                            step="0.01" name="preco" value="{{ $produto->preco }}">

                            <div class="mt-10 block mb-5">
                                <a href="{{ route('produtos.index') }}">
                                    <button type="button" class="rounded-lg bg-vermelho dark:hover:bg-red-600 text-white p-4">Cancelar</button>
                                </a>

                                <button type="submit" class="ml-2 px-6 rounded-lg bg-verde-claro dark:hover:bg-green-700 text-white p-4">Salvar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
    </div>

</x-app-layout>
