<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1B3454] leading-tight">{{ $titulo }}</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('sucesso'))
                <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-3 text-sm">{{ session('sucesso') }}</div>
            @endif

            <div class="mb-4">
                <a href="{{ route($rota . '.create') }}"
                    class="inline-block rounded bg-[#1B3454] text-white px-4 py-2 text-sm font-semibold hover:bg-[#0E1A2B]">+
                    Novo registro</a>
            </div>

            <div class="bg-white shadow sm:rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-[#1B3454] text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            @foreach ($colunas as $coluna)
                                <th class="px-4 py-3 text-left">{{ $campos[$coluna]['label'] }}</th>
                            @endforeach
                            <th class="px-4 py-3 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($itens as $item)
                            <tr>
                                <td class="px-4 py-3">{{ $item->id }}</td>
                                @foreach ($colunas as $coluna)
                                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::limit($item->$coluna, 70) }}</td>
                                @endforeach
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <a href="{{ route($rota . '.edit', $item->id) }}"
                                        class="text-[#1B3454] font-semibold underline">Editar</a>
                                    <form action="{{ route($rota . '.destroy', $item->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Excluir este registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ml-3 text-red-600 font-semibold underline">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($colunas) + 2 }}" class="px-4 py-6 text-center text-gray-500">
                                    Nenhum registro.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $itens->links() }}</div>
        </div>
    </div>
</x-app-layout>
