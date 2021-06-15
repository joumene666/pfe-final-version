<div>
    @if (Session::get('success'))

    <div class="fixed top-0 right-0 p-8" x-data="{show: true}" x-show="show">
        <div class="bg-green-300 text-sm rounded shadow-xl px-12 py-3 flex items-center justify-between">
            <span class="block mr-6">
                {{ Session::get('success') }}
            </span>
            <span class="block w-4 cursor-pointer" x-on:click="show = false">
                <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" class="fill-current text-green-800"
                        fill-rule="evenodd">
                        <g id="icon-shape">
                            <polygon id="Combined-Shape"
                                points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644">
                            </polygon>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
    </div>
@endif
@if (Session::get('error'))

    <div class="fixed top-0 right-0 p-8" x-data="{show: true}" x-show="show">
        <div class="bg-red-300 text-sm rounded shadow-xl px-12 py-3 flex items-center justify-between">
            <span class="block mr-6">
                {{ Session::get('error') }}
            </span>
            <span class="block w-4 cursor-pointer" x-on:click="show = false">
                <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" class="fill-current text-red-800"
                        fill-rule="evenodd">
                        <g id="icon-shape">
                            <polygon id="Combined-Shape"
                                points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644">
                            </polygon>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
    </div>
@endif
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
                Ajouter
            </button>
        </div>
    </form>
</div>
