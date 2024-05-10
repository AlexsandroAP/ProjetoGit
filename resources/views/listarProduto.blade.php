<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Supermercado') }}
        </h2>
    </x-slot>

    @if (session()->has('mensagem'))
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 relative" role="alert" id="meuAlerta">
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
            <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
        </span>
        {{ session()->get('mensagem') }}
    </div>
    @endif


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
                                    <li>{{ $produto->preco}}</li>
                                
                            </td>
                            
                            <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                               
                            <a href="{{ route('produtos.show',['produto' => $produto->id]) }}">
                                    <button class="rounded-lg bg-red-500 text-white p-4">Excluir</button>
                                </a>
                                
                                <a href="{{ route('produtos.edit',['produto' => $produto->id]) }}">
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














