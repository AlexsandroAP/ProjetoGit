<x-guest-layout class="h-screen flex items-center justify-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <style>
        .bg-hero {
            background-image: url('https://source.unsplash.com/1600x900/?nature,landscape');
            background-size: cover;
            background-position: center;
        }
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    </head>
    <body class="h-screen flex items-center justify-center">
        <div class="p-12 text-center max-w-lg mx-auto fade-in">
        <h1 class="text-5xl font-extrabold text-white mb-4">Bem-vindo!<h1>
            <p class="text-xl text-white mb-8">Estamos muito felizes em tê-lo aqui. Explore nosso site.</p>
            <a class="" href="{{route('register')}}">
            <x-primary-button>
                {{ __('Cadastre-se') }}
            </x-primary-button>
            </a>
            <a href="{{route('produtos.index')}}">
            <x-primary-button class="ml-2">
                {{ __('Login') }}
            </x-primary-button>
        </a>
    </div>
</body>
</html>

    
</x-guest-layout>
