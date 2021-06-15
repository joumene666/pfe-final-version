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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Gestion des structures") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                  <div class="flex items-center justify-between my-5 w-full">
                    <div class="flex items-center">
                        
                        
                        
                    </div>
                    
                    <div class="flex items-center">
                        @if (auth()->user()->type_adherent==="Directeur Executif")

                            <a href="{{ route('structures.create') }}"
                            class="block px-6 py-2 bg-blue-600 rounded-xl text-gray-100 mr-3">
                                Ajouter Structure
                            </a>
                        @endif
                        <a href="{{ route('activity.indexSt') }}"
                            class="block px-6 py-2 bg-blue-600 rounded-xl text-gray-100">
                            Historique
                        </a>
                    </div>
                </div>
                <livewire:structer-datatable />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
