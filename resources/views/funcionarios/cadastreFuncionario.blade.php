<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funcionarios') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
            <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8 text-center rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl mt-3 mb-10">Cadastro do Funcionario</h1>

                        <form method="post" action="{{route('funcionarios.store')}}">
                        @csrf
                            <h1>Adicione um(a) novo(a) funcionario(a):</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="text" name="nome"  placeholder="Digite aqui">

                            <h1 class="mt-10">CPF do(a) funcionario(a):</h1>
                            <input class="w-64 mt-2 text-black rounded-lg" type="text" name="cpf" placeholder="Digite aqui" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                            <h1 class="mt-10">Bairro do(a) funcionario(a):</h1>
                            <input class=" w-64 mt-2 text-black rounded-lg" type="text" name="quantidade"  placeholder="Digite aqui">

                            <div class="mt-10 block mb-5">
                                <a href="{{ route('funcionarios.index') }}">
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
