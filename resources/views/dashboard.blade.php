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

            <a href="{{ route('cadastre') }}">
                <button class="rounded-lg bg-green-500 text-white p-4 float-left mb-9">Criar Produto</button>
            </a>
                
                    <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b text-center">Nome do produto</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b text-center">Quantidade</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b text-center">Preço</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-black text-center">Feijão</td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">12</td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">55,3</td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                                <button class="rounded-lg bg-red-500 text-white p-4">Excluir</button>
                                <button class="rounded-lg bg-yellow-500 text-white p-4">Editar</button>
                            </td>
                        </tr>

                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">Arroz</td>

                            <td class="px-6 py-4 whitespace-nowrap text-black text-center">100</td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">100,50</td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                                <button class="rounded-lg bg-red-500 text-white p-4">Excluir</button>
                                <button class="rounded-lg bg-yellow-500 text-white p-4">Editar</button>
                            </td>
                        </tr>
        
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>














