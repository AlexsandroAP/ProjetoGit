<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

            <!-- Alertas -->
                
            @if (session()->has('mensagemCriar'))
            <div class="bg-green-100 border-l-4 border-green-500 text-black p-3 mx-auto block relative max-w-md mb-5" role="alert" id="meuAlerta">
                 <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                 <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                </span>
                {{ session()->get('mensagemCriar') }}
            </div>
            @endif

            @if (session()->has('mensagemEditar'))
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-black p-3 max-w-md mx-auto block relative mb-5" role="alert" id="meuAlerta">
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                </span>
                {{ session()->get('mensagemEditar') }}
            </div> 
            @endif
        
            @if (session()->has('mensagemDeletar'))
            <div class="bg-red-100 border-l-4 border-red-500 text-black p-3 max-w-md mx-auto block relative mb-5" role="alert" id="meuAlerta">
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                </span>
                {{ session()->get('mensagemDeletar') }}
            </div>
            @endif

    <div class="overflow-auto">
    <table class=" w-full md:min-w-full border border-gray-300">
        <thead>
            <tr>
                <th class="px-2 md:px-6 py-3 text-xs  font-medium text-gray-300 uppercase tracking-wider border-b text-center">Nome do funcionario</th>
                <th class="px-2 md:px-6 py-3 text-xs font-medium text-gray-300 uppercase tracking-wider border-b text-center">CPF</th>
                <th class="px-2 md:px-6 py-3 text-xs font-medium text-gray-300 uppercase tracking-wider border-b text-center">Bairro</th>
                <th class="px-6 py-3 text-left font-thin uppercase text-center">
                    <a href="{{route('funcionarios.create')}}">
                    <button class="rounded-lg bg-verde-claro dark:hover:bg-green-700 text-white p-3.5 px-8">Inserir Funcionario</button>
                    </a>
                </th>
            </tr>
        </thead>
    <tbody>
    @if($funcionarios->isEmpty())
        <tr class="bg-gray-100 border-b">
            <td colspan="4" class="py-6 whitespace-nowrap text-gray-600 text-center">Não há funcionarios cadastrados.</td>
        </tr>
    @endif
    @foreach ($funcionarios as $funcionario)
            <tr class="bg-gray-100 border-b">
                <td class="px-6 py-4 whitespace-nowrap text-black text-center">
                    <p>{{ $funcionario->nome}}</p>
                </td>
                <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                    <p>{{ $funcionario->cpf}}</p>
                </td>
                <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                    <p>{{ $funcionario->bairro }}</p>
                </td>
                <td class="px-6 py-4 text-black whitespace-nowrap text-center">
                    <a href="{{ route('funcionarios.edit',['funcionario' => $funcionario->id]) }}">
                        <button class="rounded-lg dark:hover:bg-yellow-600 bg-yellow-500 text-white p-4">Editar</button>
                    </a>
                    <a href="{{ route('funcionarios.show',['funcionario' => $funcionario->id]) }}">
                    <button class="rounded-lg dark:hover:bg-red-600 bg-vermelho text-white p-4">Excluir</button>
                    </>
                </td>
            </tr>
    @endforeach
   
    </tbody>
    </table>
    </div>
</x-app-layout>














