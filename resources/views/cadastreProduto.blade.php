<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Supermercado') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
            <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8 text-center rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl mt-3 mb-10">Cadastro de produtos</h1>

                        <form method="post" action="{{route('produtos.store')}}">
                        @csrf
                            <h1>Adicione um novo produto:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="text" name="nome" placeholder="Digite aqui">

                            <h1 class="mt-10">Quantidade dos produtos:</h1>
                            <input class=" w-64 mt-2 text-black rounded-lg" type="number" name="quantidade" placeholder="Digite aqui">

                            <h1 class="mt-10">Preço total dos produtos:</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg"
                            step="0.01"  
                            type="number" name="preco" placeholder="Digite aqui">

                            <div class="mt-10 block mb-5">
                                <a href="{{ route('produtos.index') }}">
                                    <button type="button" class="rounded-lg bg-vermelho text-white p-4">Cancelar</button>
                                </a>

                                <button type="submit" class="ml-2 px-6 rounded-lg bg-verde-claro text-white p-4">Salvar</button>
                            </div>
                        </form>
                    

                    </div>
                </div>
            </div>
    </div>

</x-app-layout>
