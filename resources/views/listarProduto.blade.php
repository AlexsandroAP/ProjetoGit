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

            <a href="{{route('produtos.create')}}">
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

                    @foreach ($produtos as $produto)
                    <tbody>
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-black text-center">
                                
                                    <li>{{ $produto->nome}}</li>
                                
                            </td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                                    <li>{{ $produto->quantidade}}</li>
                              
                            </td>

                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                                    <li>{{ $produto->precoTotal}}</li>
                                
                            </td>
                            
                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                               
                                <button class="rounded-lg bg-red-500 text-white p-4">Excluir</button>
                                
                                <a href="{{ route('produtos.edit',['produtos' => $produto->id]) }}">
                                    <button class="rounded-lg bg-blue-500 text-white p-4">Editar</button>
                                </a>
                            </td>
                        </tr>

                    </tbody>

                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>














