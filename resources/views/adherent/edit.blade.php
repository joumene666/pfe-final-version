<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adhérent {{$adherent->firstname}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/gestion-des-adhérents/{{$adherent->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid-cols-3 grid gap-4">
                            <div class="mb-4 w-64">
                                <label for="type" class="block mb-1">
                                    Nom
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="type" name="firstname" autoComplete="off" value="{{ $adherent->firstname }}" />
                                @error('firstname')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 w-64">
                                <label for="lastName" class="block mb-1">
                                    Prénom
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="lastname" name="lastname" autoComplete="off" value="{{ $adherent->lastname }}" />
                                @error('lastname')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 w-64">
                                <label for="cin" class="block mb-1">
                                    CIN/Passport
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="cin" name="cin" autoComplete="off" value="{{ $adherent->cin }}" />
                                @error('cin')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="Nationalité" class="block mb-1">
                                    Nationalité
                                    <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="nationality" name="nationality" autoComplete="off"
                                    value="{{ $adherent->nationality }}" />
                                @error('nationality')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="profession" class="block mb-1">
                                    Profession
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="profession" name="profession" autoComplete="off"
                                    value="{{ $adherent->profession }}" />
                                @error('profession')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                           
                            
                            <div class="mb-4 w-64">
                                <label for="sexe" class="block mb-1">
                                    Genre
                                    <span class="text-red-500">*</span>
                                </label>
                                <select type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="gender" name="gender" autoComplete="off" value="{{ $adherent->gender }}">
                                    {{-- <option disabled selected>choisissez</option> --}}
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                                @error('gender')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="date_naissance" class="block mb-1">
                                    Date de naissance
                                    <span class="text-red-500">*</span>
                                </label>

                                <input type="date"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="date_naissance" name="date_naissance"
                                    value="{{ $adherent->birth_date }}" />
                                @error('date_naissance')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="birthPlace" class="block mb-1">
                                    Lieu de naissance
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="birth_place" name="birth_place" autoComplete="off"
                                    value="{{ $adherent->place_birth }}" />
                                @error('birth_place')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-4 w-64">
                                <label for="type" class="block mb-1">
                                    Type Adhérent
                                    <span class="text-red-500">*</span>
                                </label>
                                <select type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="type" name="type" autoComplete="off" value="{{ $adherent->type }}">
                                    <option value="Président">Président(e)</option>
                                    <option value="Vice Président">Vice Président(e) </option>
                                    <option value="Directeur(rice) Executif">
                                        Directeur(rice) Executif(ve)
                                    </option>
                                    <option value="Trésorier(e)">Trésorier(e) </option>
                                    <option value="Simple Membre">Simple Membre </option>
                                </select>
                                @error('type')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="joiningDate" class="block mb-1">
                                    Date d'adhésion
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="joining_date" autoComplete="off" name="joining_date"
                                    value="{{ $adherent->joinning_date }}" />
                                @error('joining_date')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64 flex items-center">
                                <div class="flex-1">
    
                                    <label for="image" class="block mb-1">
                                        Déposez une image
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file"
                                        class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                        id="image" name="image" autoComplete="off" />
                                        @error('image')
                                            <span class="text-red-400">{{ $message }}</span>
                                        @enderror
                                </div>
                                
                            </div>

                            <div class="mb-4 w-64">
                                <label for="email" class="block mb-1">
                                    Email
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="email" name="email" autoComplete="off" value="{{ $adherent->email }}" />
                                @error('email')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="telephone" class="block mb-1">
                                    Telephone
                                    <span class="text-red-500">*</span>
                                </label>
                                <input pattern="\d*" type="text"
                                    class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                    id="telephone" name="phone" autoComplete="off" value="{{ $adherent->phone }}" />
                                @error('phone')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 w-64">
                                <label for="code-structure" class="block mb-1">
                                    Code Strcuture
                                    <span class="text-red-500">*</span>
                                </label>
                                <select type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="code_structure" name="code_structure" autoComplete="off" value="{{$adherent->code_structure}}">
                                    @foreach ($structers as $st)

                                        <option value="{{ $st->id }}">
                                            {{ $st->code_structer }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('code_structure')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 w-64">
                                <label for="commission" class="block mb-1">
                                    Code Commission
                                    <span class="text-red-500">*</span>
                                </label>
                                <select type="text"
                                    class="bg-gray-100 border border-blue-300 py-2 px-2 focus:outline-none rounded w-full block"
                                    id="commission" name="commission" autoComplete="off"
                                    value="{{ $adherent->commission }}">
                                    <option value="Enseignement-sciences-technologie">
                                        Enseignement, sciences et technologie
                                    </option>
                                    <option value="Développement-économique-emploi">
                                        Développement économique et emploi
                                    </option>
                                    <option value="Socialsanté">Social et santé </option>
                                    <option value="Culture, tourisme et environnement ">
                                        Culture, tourisme et environnement
                                    </option>
                                </select>
                                @error('commission')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" w-full">
                            <label for="observation" class="block mb-1">
                                Observation
                            </label>
                            <textarea
                                class="bg-gray-100 border border-blue-300  py-2 px-2 focus:outline-none rounded w-full block"
                                id="observation" autoComplete="off" name="observation">{{ $adherent->observation }}</textarea>
                            @error('observation')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center py-8">
                            <a href="{{route('adherent.index')}}"
                                class="bg-red-400 px-12 py-3 rounded text-white mr-8">
                                Fermer
                            </a>
                            <button type="submit" class="bg-indigo-600 px-12 py-3 rounded text-white">
                                Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
