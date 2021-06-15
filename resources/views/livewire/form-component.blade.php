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
    <form method="POST" wire:submit.prevent="addStructer">
        @csrf
        <div class="grid-cols-3 grid gap-4">
            <div class="mb-4 w-64">
                <label for="code_structer" class="block mb-1">
                    Gouvernerat
                    <span class="text-red-500">*</span>
                </label>
                <select type="text"
                    wire:change="changedGouv($event.target.value)"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="type_structure" name="type_structure" autoComplete="off"
                    value="">
                    
                    <option disabled selected>choisissez</option>
                    @foreach ($gouvernerats as $gouvernerat)
                        <option value="{{ $gouvernerat->id }}">{{ $gouvernerat->nom }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-4 w-64">
                <label for="code_structer" class="block mb-1">
                    Délegation
                    <span class="text-red-500">*</span>
                </label>
                <select type="text"
                    wire:change="changedDel($event.target.value)"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="type_structure" name="type_structure" autoComplete="off"
                    value="">
                    <option disabled selected>choisissez</option>
                    @foreach ($delegations as $delegation)
                        <option value="{{ $delegation->id }}">{{ $delegation->nom }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-4 w-64">
                <label for="code_structer" class="block mb-1">
                    Secteur
                    <span class="text-red-500">*</span>
                </label>
                <select type="text"
                    wire:model="secteur_id"
                    wire:change="changedSec($event.target.value)"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="type_structure" name="type_structure" autoComplete="off"
                    value="">
                    <option disabled selected>choisissez</option>
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4 w-64">
                <label for="date_creation" class="block mb-1">
                    Date creation
                    <span class="text-red-500">*</span>
                </label>
                <input type="date"
                    wire:model="date_creation"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="date_creation" name="date_creation" autoComplete="off"
                    value="" />
                @error('date_creation')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 w-64">
                <label for="date_creation" class="block mb-1">
                    code Structure
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                disabled
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    autoComplete="off"
                    value="{{$code}}" />
                @error('date_creation')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>



            <div class="mb-4 w-64">
                <label for="type_structure" class="block mb-1">
                    Type structure
                    <span class="text-red-500">*</span>
                </label>
                <select type="text"
                    wire:model="type_structure"
                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                    id="type_structure" name="type_structure" autoComplete="off"
                    value="">
                    <option disabled selected>choisissez</option>
                    <option value="National">National</option>
                    <option value="regional">Régional</option>
                    <option value="local">local</option>
                </select>
                @error('type_structure')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 w-64">
                <label for="matricule-fiscale" class="block mb-1">
                    Matricule fiscale
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    wire:model="matricule_fiscale"
                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                    id="matricule-fiscale" name="matricule-fiscale" autoComplete="off"
                    value="" />
                @error('matricule-fiscale')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 w-64">
                <label for="jort-creation" class="block mb-1">
                    Jort creation
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    wire:model="jort_creation"
                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                    id="jort-creation" name="jort-creation" autoComplete="off"
                    value="" />
                @error('jort-creation')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4 w-64">
                <label for="num_compte_bancaire" class="block mb-1">
                    Numéro compte bancaire
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    wire:model="num_compte_bancaire"
                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                    id="num-compte-bancaire" autoComplete="off" name="num-compte-bancaire"
                    value="" />
                @error('joining_date')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="flex items-center py-8">
            <a href="{{route('structures.index')}}"
                class="bg-red-400 px-12 py-3 rounded text-white mr-8">
                Fermer
            </a>
            <button type="submit" class="bg-indigo-600 px-12 py-3 rounded text-white">
                Ajouter
            </button>
        </div>
    </form>
</div>
