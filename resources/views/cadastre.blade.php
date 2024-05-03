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
                        <h1 class="text-3xl mb-10">Cadastro de produtos</h1>

                        <form method="POST" action="">
                        @csrf
                            <h1>Adicione um novo produto:</h1>
                            <input class="text-black" type="text" name="nome" placeholder="Digite aqui">

                            <h1 class="mt-7">Quantidade dos produtos:</h1>
                            <input class="text-black" type="number" step="0.01" name="quantidade" placeholder="Digite aqui">

                            <h1 class="mt-7">Preço total dos produtos:</h1>
                            <input class="text-black" type="number" name="preco" placeholder="Digite aqui">

                            <div class="mt-4 block mt-7">
                                <a href="{{ route('listarProduto') }}">
                                    <button type="button" class="rounded-lg bg-red-500 text-white p-4">Cancelar</button>
                                </a>

                                <button type="submit" class="rounded-lg bg-green-500 text-white p-4">Salvar</button>
                            </div>
                        </form>
                    

                    </div>
                </div>
            </div>
    </div>

</x-app-layout>
