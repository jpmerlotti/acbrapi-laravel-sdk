<div class="acbr-cep-lookup-container">
    <div class="relative">
        <label for="cep" class="block text-sm font-medium leading-6 text-gray-900">CEP</label>
        <div class="mt-2 flex rounded-md shadow-sm">
            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                <input type="text" 
                       wire:model.live="cep" 
                       id="cep" 
                       class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                       placeholder="00000-000">
                
                @if($loading)
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="animate-spin h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <button type="button" 
                    wire:click="search"
                    class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Buscar
            </button>
        </div>
    </div>

    @error('cep')
        <p class="mt-2 text-sm text-red-600" id="cep-error">{{ $message }}</p>
    @enderror

    @if(!empty($address))
        <div class="mt-4 p-4 rounded-lg bg-indigo-50 border border-indigo-100 animate-in fade-in slide-in-from-top-2">
            <h4 class="text-xs font-bold text-indigo-700 uppercase tracking-wider">Endereço Encontrado</h4>
            <div class="mt-1 text-sm text-indigo-900">
                {{ $address['logradouro'] }}, {{ $address['bairro'] }}<br>
                {{ $address['cidade'] }} - {{ $address['uf'] }}
            </div>
        </div>
    @endif
</div>
