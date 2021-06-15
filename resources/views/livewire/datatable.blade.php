<div >
    <div 
    class="{{$showPopUp ? 'hidden' : ''}} flex absolute top-0 left-0 items-center justify-center h-screen w-full"
    
    >
        <div class="bg-white rounded shadow-xl p-10">
            <h1 class="text-lg text-black mb-8">Voulez vous supprimer cette adhérent</h1>
            <div class="flex items-center justify-center">
                <button wire:click="cancel()" class="px-6 py-2 bg-gray-300 rounded mr-3">
                    Annuler
                </button>
                <button wire:click="destroy()" class="px-6 py-2 bg-red-400 rounded">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
    <div class="my-6 flex items-center">
        <button class="flex items-center relative focus:outline-none border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-72 mr-4">

            <input  
            type="search" 
            class="block px-2 py-3 text-xs flex-1 relative z-10 rounded-l-md border-gray-200 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
            placeholder="Chercher"
            wire:model="searchTerm" />
    
            <div class="px-5 py-3 bg-gray-100 rounded-r-md">
                <div class="w-4">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><defs></defs><title>x</title><path class="cls-1" d="M120.5891,106.37506,96.5609,80.39355l-3.842,3.8457-4.35187-4.35187c.33368-.43195.667-.864.98346-1.30475A46.77661,46.77661,0,1,0,77.87956,89.85687q.99472-.68619,1.955-1.42987l4.34509,4.345-4.31427,4.31409,26.5097,23.5246a10.0585,10.0585,0,1,0,14.21405-14.23566ZM74.21977,74.22931a32.4793,32.4793,0,1,1,9.48859-22.94189A32.48241,32.48241,0,0,1,74.21977,74.22931Z"/></svg>
                </div>
            </div>
        </button>
        <span class="block w-8 cursor-pointer" id="btnprn">
            <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" class="fill-current text-black" fill-rule="evenodd">
                    <g id="icon-shape">
                        <path
                            d="M16,16 L20,16 L20,6 L0,6 L0,16 L4,16 L4,10 L16,10 L16,16 Z M4,10 L16,10 L16,20 L4,20 L4,10 Z M6,12 L14,12 L14,18 L6,18 L6,12 Z M4,0 L16,0 L16,5 L4,5 L4,0 Z M2,8 L4,8 L4,10 L2,10 L2,8 Z M6,8 L8,8 L8,10 L6,10 L6,8 Z"
                            id="Combined-Shape"></path>
                    </g>
                </g>
            </svg>
        </span>
    </div>
    <table class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 text-sm">
        <thead class="text-white">
            <tr
                class=" bg-gradient-joumene flex-col flex-no-wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
    
                <th class="p-3 text-left capitalize">Code</th>
                <th class="p-3 text-left capitalize">Nom</th>
                <th class="p-3 text-left capitalize">Prénom</th>
    
                <th class="p-3 text-left capitalize">Genre</th>
                <th class="p-3 text-left capitalize">Email</th>
                <th class="p-3 text-left capitalize">Téléphone</th>
                <th class="p-3 text-left capitalize">Type</th>
                <th class="p-3 text-left capitalize w-64">Action</th>
            </tr>
        </thead>
        <tbody class="flex-1 sm:flex-none">
            @foreach ($adherents as $adherent)
    
                <tr key={index} class="flex flex-col flex-no-wrap sm:table-row mb-2 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                        <strong>#{{ $adherent->code_adherent }} </strong>
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 overflow-hidden">
                        {{ $adherent->firstname }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 overflow-hidden">
                        {{ $adherent->lastname }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 overflow-hidden">
                        {{ $adherent->gender }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 overflow-hidden">
                        {{ $adherent->email }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                        {{ $adherent->phone }}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                        {{ $adherent->type_adherent }}
                    </td>
    
                    <td class="border-grey-light border">
                        <div class="flex items-center">
                            @if (auth()->user()->type_adherent==="Directeur Executif")
                            <a href="/gestion-des-adhérents/{{$adherent->id}}/edit"
                                class="hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer focus:outline-none capitalize">
                                Modifier
                            </a>
    
                            <span>|</span>
    
                            <button wire:click="showPopUp({{$adherent->id}})" type="button"
                                class="hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer focus:outline-none capitalize">
                                Supprimer
                            </button>
                            <span>|</span>
                            @endif
                            <a href="/gestion-des-adhérents/{{$adherent->id}}" 
                                class="block hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer focus:outline-none capitalize">
                                Consulter
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$adherents->links()}}
</div>
