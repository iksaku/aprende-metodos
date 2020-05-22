<div class="w-full bg-gray-50 md:border-x border-y border-gray-400 md:rounded-lg overflow-hidden">
    <div class="w-full flex items-center justify-end border-b border-gray-400 px-4 py-2">
        <button
            class="text-gray-100 font-medium bg-blue-500 px-4 py-2 rounded-lg space-x-1"
            wire:click="$refresh"
        >
            <span class="fas fa-sync-alt"></span>
            <span>Actualizar</span>
        </button>
    </div>

    <div wire:loading class="w-full text-center text-gray-700 p-4">
        <span class="fas fa-sync-alt fa-4x fa-spin"></span>
    </div>

    <div wire:loading.remove class="w-full overflow-x-auto">
        @if(count($this->ranking) < 1)
            <div class="w-full text-center font-medium p-4">
                No se han registrado respuestas para este Método.
            </div>
        @else
            <table class="min-w-full tracking-wide">
                {{-- Table Head --}}
                <thead class="text-gray-700 text-sm bg-gray-200 font-semibold uppercase">
                <tr class="border-b border-gray-400 ">
                    <th class="px-4 md:px-6 py-2 text-center">Posición</th>
                    <th class="px-4 md:px-6 py-2 text-left">Tiempo</th>
                    <th class="px-4 md:px-6 py-2 text-left">Nombre</th>
                </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="font-medium divide-y divide-gray-200">
                    @foreach($this->ranking as $position => $data)
                        <tr @if(Auth::user()->is($data['user'])) class="bg-yellow-200 font-medium" @endif>
                            {{-- Rank --}}
                            <td class="px-4 md:px-6 py-2 text-center">
                                #{{ $position + 1 }}
                            </td>

                            {{-- Time --}}
                            <td class="px-4 md:px-6 py-2 text-left whitespace-no-wrap">
                                {{ $data['time'] }}
                            </td>

                            {{-- Name --}}
                            <td class="w-full max-w-xs md:max-w-sm xl:max-w-2xl px-4 md:px-6 py-2 truncate">
                                {{ $data['user']->name }}
                                @if(Auth::user()->is($data['user']))
                                    (Tú)
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @if(!$this->isUserRanked && $this->userTime !== null)
                        <tr>
                            <td class="text-center text-lg font-semibold" colspan="3">
                                ...
                            </td>
                        </tr>

                        <tr class="bg-yellow-200 font-medium">
                            {{-- Rank --}}
                            <td class="px-4 md:px-6 py-2 text-center whitespace-no-wrap">
                                (Sin Rango)
                            </td>

                            {{-- Time --}}
                            <td class="px-4 md:px-6 py-2 text-left whitespace-no-wrap">
                                {{ $this->userTime }}
                            </td>

                            {{-- Name --}}
                            <td class="w-full max-w-xs md:max-w-sm xl:max-w-2xl px-4 md:px-6 py-2 truncate">
                                {{ Auth::user()->name }} (Tú)
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif
    </div>
</div>
