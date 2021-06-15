<div>
    
    <form wire:submit.prevent="formSubmit()" method="post">
        @csrf
        <div class="grid-cols-3 grid gap-4">
            <div class="mb-4 w-64">
                <label for="code_adherent" class="block mb-1">
                    Code Adhérent
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    wire:model="searchTerm"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    name="code_adherent" autoComplete="off"
                    placeholder="{{$code_adherentP}}"
                     />

                     @if (strlen($searchTerm) > 0 )
                     <ul class="absolute w-72 z-40 bg-white border border-gray-300 rounded-md mt-2 text-sm divide-y divide-gray-200 shadow" x-data="{show: true}" x-show="show"> 
                             <li class="px-4 py-4 hover:bg-gray-100 transition ease-in-out duration-150">
                                 <span class="block text-xs text-gray-600">{{ $searchTerm }}</span>
                             </li>
                         @forelse ($searchResult as $result)
                             
                             <li>
                                 <div class="px-4 py-4 hover:bg-gray-100 transition ease-in-out duration-150 " x-on:click="show = false" wire:click="getCodeAdherent('{{ $result->id }}', '{{ $result->code_adherent }}')">
                                     <strong>{{ $result->name }}</strong>
                                     <span class="block text-xs text-gray-600">#{{ $result->code_adherent }} -- {{ $result->firstname }}</span>
                                 </div>
                             </li>
                         @empty
                             <li class="px-4 py-4 hover:bg-gray-100 transition ease-in-out duration-150">
                                 <span class="block text-xs text-gray-600"> {{ __('Aucune resultat') }} </span>
                             </li>    
                         @endforelse
                             
                         
                     
                     </ul>
                 @endif 
            </div>
            <div class="mb-4 w-64">
                <label for="cotisation" class="block mb-1">
                    Cotisation
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    wire:model="cotisation"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="cotisation" name="cotisation" autoComplete="off" />
                @error('cotisation')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center py-8">
            <a href="{{route('financiere.index')}}"
                class="bg-red-400 px-12 py-3 rounded text-white mr-8">
                Fermer
            </a>
            <button type="submit" class="bg-indigo-600 px-12 py-3 rounded text-white">
                Modifier
            </button>
        </div>
    </form>
</div>

