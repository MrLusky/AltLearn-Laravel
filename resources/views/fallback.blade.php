<x-publico-layout>
    <section class="max-w-2xl mx-auto px-4 py-24 text-center">
        <p class="text-7xl font-extrabold text-[#C9B6FF]">404</p>
        <h1 class="mt-4 text-2xl font-bold">Página não encontrada</h1>
        <p class="mt-2 text-white/70">O endereço <span class="font-mono">/{{ request()->path() }}</span> não existe no AltLearn.</p>
        <a href="{{ route('home') }}" class="inline-block mt-8 rounded-full bg-[#C9B6FF] text-[#0E1A2B] px-6 py-2 font-semibold">Voltar ao início</a>
    </section>
</x-publico-layout>