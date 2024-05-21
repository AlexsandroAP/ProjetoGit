<x-guest-layout class="h-screen flex items-center justify-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-white">Bem Vindo {{ Auth::user()->name }}!</h1>
        <p class="text-white">Seja bem-vindo ao nosso site. Esperamos que você aproveite sua visita.</p>
        

        <a href="{{route('produtos.index')}}">
            <x-primary-button class="mt-4">
                {{ __('Entrar') }}
            </x-primary-button>
        </a>
        
    
    </div>
    
</x-guest-layout>
