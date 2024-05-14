<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Supermercado') }}
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl mb-10">Excluir produto: 
                            <br>
                            {{ $produto->nome }}</h1>

                        <form method="post" action="{{route('produtos.destroy', ['produto' => $produto->id])}}">
                        
                        @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <h1 class="mt-10">Produto:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="text" name="nome" readonly value="{{ $produto->nome }}">
                            
                            <h1 class="mt-10">Quantidade dos produtos:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="number" name="quantidade" readonly value="{{ $produto->quantidade }}">

                            <h1 class="mt-10">Preço total dos produtos:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="number" 
                            step="0.01" 
                            readonly name="preco" value="{{ $produto->preco }}">


                            <div class="mt-10 block mb-5">
                                <a href="{{ route('produtos.index') }}">
                                    <button type="button" class="rounded-lg bg-yellow-500 text-white p-4">Cancelar</button>
                                </a>

                                <button type="submit" class="ml-2 rounded-lg bg-vermelho text-white p-4">Deletar</button>
                            </div>
                        </form>
                    

                    </div>
                </div>
            </div>
    </div>

</x-app-layout>
