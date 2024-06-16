<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de Funcionario(a)') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="mt-5 bg-red-100 border-l-4 border-red-500 text-black p-3 mx-auto block relative max-w-md" role="alert" id="meuAlerta">
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                    </span>
                    {{ $error }}
                </div>
        @endforeach
    @endif

    <div class="py-12 px-4">
            <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8 text-center rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl mt-3 mb-10">Cadastro do Funcionario(a)</h1>

                        <form method="post" action="{{route('funcionarios.store')}}">
                        @csrf
                            <h1>Adicione um(a) novo(a) funcionario(a):</h1>
                            <input class=" w-64 h-10 mt-2 text-black rounded-lg" type="text" name="nome"  placeholder="Digite aqui">

                            <h1 class="mt-10">Cargo do(a) funcionario(a):</h1>
                            <input class=" w-64 mt-2 text-black rounded-lg" type="text" name="cargo"  placeholder="Digite aqui">

                            <h1 class="mt-10">CPF do(a) funcionario(a):</h1>

                            <script>
                                function formatarCPF(campo) {
                                    let cpf = campo.value;
                                    cpf = cpf.replace(/\D/g, "");
                                    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                                    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                                    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
                                    campo.value = cpf;
                                }
                            </script>

                            <input class="w-64 mt-2 text-black rounded-lg" type="text" name="cpf" placeholder="Digite aqui" maxlength="14" oninput="formatarCPF(this)" onblur="validarCPF(this)">



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
