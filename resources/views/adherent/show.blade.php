<x-app-layout>

    @if (Session::get('success'))

        <div class="fixed top-0 right-0 p-8" x-data="{show: true}" x-show="show">
            <div class="bg-green-300 text-sm rounded shadow-xl px-12 py-3 flex items-center justify-between">
                <span class="block mr-6">
                    {{ Session::get('success') }}
                </span>
                <span class="block w-4 cursor-pointer" x-on:click="show = false">
                    <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" class="fill-current text-green-800" fill-rule="evenodd">
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
                        <g id="Page-1" stroke="none" stroke-width="1" class="fill-current text-red-800" fill-rule="evenodd">
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adhérent {{$adherent->firstname}}
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
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-40 w-40 rounded-full border border-blue-400">

                            <img src="{{asset('assets/images')}}/{{$adherent->image}}" alt="" class="w-40 h-40 bg-cover bg-center object-cover rounded-full">
                        </div>

                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Code adhérent</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->code_adherent}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Nom</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->firstname}}</span> 
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Prénom</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->lastname}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">CIN/Passport</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->cin}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Nationalité</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->nationality}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Profession</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->profession}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Genre</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->gender}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Date de naissance</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->birth_date}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Lieu de naissance:</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->place_birth}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Type Adhérent</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->type_adherent}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Date d'adhésion</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->joinning_date}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Email</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->email}}</span>
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Telephone</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->phone}}</span>
                        </div>
                        
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Code Strcuture</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->structer_id}}</span>
                        </div>
                        
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm "> Commission</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->code_commession}}</span>
                       
                        </div>
                        <div class="w-full py-3 px-3 bg-white border border-gray-200 rounded shadow-xl">
                            <h3 class="font-bold text-sm ">Observation</h3>
                            <span class="block text-xs text-gray-500">{{$adherent->observation}}</span>
                        </div>
                       

                    </div>
                    <div class="flex justify-end">
                        <a href="{{route('adherent.index')}}" class="bg-gray-200 px-4 py-2 rounded-xl">Fermer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
