<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1B3454] leading-tight">
            {{ $item->exists ? 'Editar' : 'Novo registro' }} · {{ $titulo }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST"
                    action="{{ $item->exists ? route($rota . '.update', $item->id) : route($rota . '.store') }}">
                    @csrf
                    @if ($item->exists)
                        @method('PUT')
                    @endif

                    @foreach ($campos as $nome => $campo)
                        <div class="mb-4">
                            <label for="{{ $nome }}"
                                class="block font-medium text-sm text-gray-700">{{ $campo['label'] }}</label>

                            @if ($campo['tipo'] === 'textarea')
                                <textarea id="{{ $nome }}" name="{{ $nome }}" rows="5"
                                    class="mt-1 block w-full border-gray-300 focus:border-[#C9B6FF] focus:ring-[#C9B6FF] rounded-md shadow-sm">{{ old($nome, $item->$nome) }}</textarea>
                            @elseif ($campo['tipo'] === 'select')
                                <select id="{{ $nome }}" name="{{ $nome }}"
                                    class="mt-1 block w-full border-gray-300 focus:border-[#C9B6FF] focus:ring-[#C9B6FF] rounded-md shadow-sm">
                                    @foreach ($campo['opcoes'] as $opcao)
                                        <option value="{{ $opcao }}" @selected(old($nome, $item->$nome) === $opcao)>
                                            {{ $opcao }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input id="{{ $nome }}" name="{{ $nome }}"
                                    type="{{ $campo['tipo'] }}" value="{{ old($nome, $item->$nome) }}"
                                    class="mt-1 block w-full border-gray-300 focus:border-[#C9B6FF] focus:ring-[#C9B6FF] rounded-md shadow-sm">
                            @endif

                            <x-input-error :messages="$errors->get($nome)" class="mt-2" />
                        </div>
                    @endforeach

                    <div class="flex items-center gap-4">
                        <button
                            class="rounded bg-[#1B3454] text-white px-5 py-2 text-sm font-semibold hover:bg-[#0E1A2B]">Salvar</button>
                        <a href="{{ route($rota . '.index') }}" class="text-sm text-gray-600 underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
