<x-guest-layout class="h-screen flex items-center justify-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    </head>
    <body class="h-screen flex items-center justify-center">
        <div class="p-12 text-center max-w-lg mx-auto fade-in">
            
@if(auth()->check())
    <h1 class="text-4xl font-bold text-white mb-4">Bem-vindo de volta {{ Auth::user()->name }}!<h1>
    <p class="text-xl text-white mb-8">Estamos muito felizes em tê-lo aqui. Explore nosso site.</p>

    <a href="{{ route('produtos.index') }}">
        <x-primary-button>
            {{ __('Entrar Novamente') }}
        </x-primary-button>
    </a>

@else
    <h1 class="text-5xl font-extrabold text-white mb-4">Bem-vindo!<h1>
    <p class="text-xl text-white mb-8">Estamos muito felizes em tê-lo aqui. Explore nosso site.</p>
    
    <a href="{{ route('register') }}">
        <x-primary-button>
            {{ __('Cadastre-se') }}
        </x-primary-button>
    </a>

    <a href="{{route('produtos.index')}}">
            <x-primary-button class="ml-2">
                {{ __('Login') }}
            </x-primary-button>
        </a>
@endif

            
    </div>
</body>
</html>

    
</x-guest-layout>
