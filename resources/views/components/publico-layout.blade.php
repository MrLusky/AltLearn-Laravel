<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AltLearn | TCC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0E1A2B] text-white antialiased">
    <header class="bg-[#1B3454] border-b border-[#C9B6FF]/30 sticky top-0 z-10">
        <nav class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('home') }}" class="text-xl font-extrabold text-[#C9B6FF]">AltLearn</a>
            <div class="flex flex-wrap items-center gap-4 text-sm">
                <a href="{{ route('home') }}#secoes" class="hover:text-[#C9B6FF]">Artigo</a>
                <a href="{{ route('home') }}#atividades" class="hover:text-[#C9B6FF]">Atividades</a>
                <a href="{{ route('home') }}#recursos" class="hover:text-[#C9B6FF]">Recursos</a>
                <a href="{{ route('home') }}#referencias" class="hover:text-[#C9B6FF]">Referências</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-full bg-[#C9B6FF] text-[#0E1A2B] px-4 py-1.5 font-semibold">Painel</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-[#C9B6FF]">Entrar</a>
                    <a href="{{ route('register') }}" class="rounded-full bg-[#C9B6FF] text-[#0E1A2B] px-4 py-1.5 font-semibold">Cadastrar</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>{{ $slot }}</main>

    <footer class="bg-[#1B3454] text-center text-sm text-white/70 py-6 mt-16">
        AltLearn · {{ config('tcc.evento') }} · {{ config('tcc.local') }}
    </footer>
</body>
</html>