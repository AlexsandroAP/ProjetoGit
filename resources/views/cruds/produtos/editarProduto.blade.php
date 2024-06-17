<x-app-layout>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crudRenanLaravel";

        try {
            $conn = new PDO("mysql:host=localhost;dbname=crudRenanLaravel", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $sql = "SELECT nome FROM categorias";
        $result = $conn->query($sql);
    ?>

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

                            @if ($errors->any())
        @foreach ($errors->get('nome') as $error)
            <div class="text-red-500" role="alert" id="meuAlerta">
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                    </span>
                    {{ $error }}
                </div>
        @endforeach
    @endif

                            <div>
                                <h1 class="mt-10">Selecione a categoria:</h1>
                                <select name="categoria" class="w-64 mt-2 text-black rounded-lg">
                                    <?php
                                    if ($result->rowCount() > 0) {
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option>' . $row["nome"] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nenhuma</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            @if ($errors->any())
        @foreach ($errors->get('categoria') as $error)
            <div class="text-red-500" role="alert" id="meuAlerta">
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                    </span>
                    {{ $error }}
                </div>
        @endforeach
    @endif
                            
                            <h1 class="mt-10">Quantidade dos produtos:</h1>
                            <input min="0" max="100000" class=" w-64 h-10 mt-2 text-black rounded-lg" type="number" name="quantidade" value="{{ $produto->quantidade }}">

                            @if ($errors->any())
        @foreach ($errors->get('quantidade') as $error)
            <div class="text-red-500" role="alert" id="meuAlerta">
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                    </span>
                    {{ $error }}
                </div>
        @endforeach
    @endif

                            <h1 class="mt-10">Preço total dos produtos:</h1>
                            <input min="0" max="100000" class=" w-64 h-10 mt-2 text-black rounded-lg" type="text"
                            step="0.01" name="preco" onKeyUp="mascaraMoeda(this, event)" value="{{ number_format($produto->preco, 2, ',', '.') }}">

                            <script>
                            String.prototype.reverse = function(){
                                return this.split('').reverse().join(''); 
                                };

                                function mascaraMoeda(campo,evento){
                                var tecla = (!evento) ? window.event.keyCode : evento.which;
                                var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
                                var resultado  = "";
                                var mascara = "##.###.###,##".reverse();
                                for (var x=0, y=0; x<mascara.length && y<valor.length;) {
                                    if (mascara.charAt(x) != '#') {
                                    resultado += mascara.charAt(x);
                                    x++;
                                    } else {
                                    resultado += valor.charAt(y);
                                    y++;
                                    x++;
                                    }
                                }
                                campo.value = resultado.reverse();
                                }
                            </script>

                            @if ($errors->any())
        @foreach ($errors->get('preco') as $error)
            <div class="text-red-500" role="alert" id="meuAlerta">
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                    </span>
                    {{ $error }}
                </div>
        @endforeach
    @endif

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
