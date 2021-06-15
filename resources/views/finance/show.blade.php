<x-app-layout>

    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une nouvelle structure') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-end my-8">
                        <span class="block w-8 cursor-pointer"  id="btnprn">
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

                    <div class="grid grid-cols-3 gap-4">
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Code Adhérent</h3>
                            <span class="block text-xs text-gray-500">{{$finance->user->code_adherent}}</span>
                        </div>
                        
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Nom</h3>
                            <span class="block text-xs text-gray-500">{{$finance->user->firstname}}</span>
                        </div>

                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Prénom</h3>
                            <span class="block text-xs text-gray-500">{{$finance->user->lastname}}</span>
                        </div>

                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Cotisation</h3>
                            <span class="block text-xs text-gray-500">{{$finance->cotisation}}</span>
                        </div>

                        
                    </div>

                    <div class="flex justify-end my-8">
                        <a href="{{route('financiere.index')}}" class="bg-gray-200 px-4 py-2 rounded-xl">Fermer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
