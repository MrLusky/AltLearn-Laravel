<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1B3454] leading-tight">Painel de Controle · AltLearn</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-[#1B3454] text-white rounded-lg p-6">
                <p class="text-lg font-semibold">Olá, {{ Auth::user()->name }}!</p>
                <p class="text-[#C9B6FF] text-sm mt-1">
                    @if (Auth::user()->isAdmin())
                        Perfil: Administrador (pode criar, editar e excluir informações).
                    @else
                        Perfil: Usuário comum (somente leitura).
                    @endif
                </p>
            </div>

            <div class="grid gap-4 grid-cols-2 lg:grid-cols-4">
                @foreach ($totais as $rotulo => $qtd)
                    <div class="bg-white rounded-lg shadow p-5 border-l-4 border-[#C9B6FF]">
                        <p class="text-3xl font-extrabold text-[#1B3454]">{{ $qtd }}</p>
                        <p class="text-sm text-gray-600">{{ $rotulo }}</p>
                    </div>
                @endforeach
            </div>

            @if (Auth::user()->isAdmin())
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.secoes.index') }}" class="rounded bg-[#1B3454] text-white px-4 py-2 text-sm">Gerenciar seções</a>
                    <a href="{{ route('admin.atividades.index') }}" class="rounded bg-[#1B3454] text-white px-4 py-2 text-sm">Gerenciar atividades</a>
                    <a href="{{ route('admin.recursos.index') }}" class="rounded bg-[#1B3454] text-white px-4 py-2 text-sm">Gerenciar recursos</a>
                    <a href="{{ route('admin.referencias.index') }}" class="rounded bg-[#1B3454] text-white px-4 py-2 text-sm">Gerenciar referências</a>
                </div>
            @endif

            @include('partials.conteudo-tcc')
        </div>
    </div>
</x-app-layout>