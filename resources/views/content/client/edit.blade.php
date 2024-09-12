@extends('layouts.master')
@section('title')
    {{ __('Account Settings') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="{{ __('t-clientsCreate') }}" pagetitle="Pages" />



    <div class="tab-content">
        <div class="block tab-pane" id="personalTabs">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-1 text-15">{{ __('t-clientsCreate') }}</h6>
                    </p>
                    <form action="{{ route('admin.client.update', $client) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium"> Nom Complet</label>
                                <input type="text" id="inputValue"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Enter your value" value="{{ old('name') ? old('name') : $client->name }}"
                                    name="name" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Phone
                                    Number</label>
                                <input type="text" id="inputValue" name="phone"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="+214 8456 8459 23"
                                    value="{{ old('phone') ? old('phone') : $client->phone }}" required>
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Email
                                    Address</label>
                                <input type="email" id="inputValue" name="email"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Enter your email address"
                                    value="{{ old('email') ? old('email') : $client->email }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Adresse</label>
                                <textarea name="adresse"
                                    class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="exampleFormControlTextarea" required placeholder="Enter your description" rows="5">{{ old('adresse') ? old('adresse') : $client->adresse }}</textarea>
                                @error('adresse')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">City</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    id="ville" name="ville" data-choices data-choices-sorting-false>
                                    <option value="">Choisir une ville</option>
                                    <option value="Casablanca"
                                        {{ old('ville') == 'Casablanca' || $client->ville == 'Casablanca' ? 'selected' : '' }}>
                                        Casablanca</option>
                                    <option value="Rabat"
                                        {{ old('ville') == 'Rabat' || $client->ville == 'Rabat' ? 'selected' : '' }}>
                                        Rabat</option>
                                    <option value="Marrakech"
                                        {{ old('ville') == 'Marrakech' || $client->ville == 'Marrakech' ? 'selected' : '' }}>
                                        Marrakech
                                    </option>
                                    <option value="Fès"
                                        {{ old('ville') == 'Fès' || $client->ville == 'Fès' ? 'selected' : '' }}>Fès
                                    </option>
                                    <option value="Tanger"
                                        {{ old('ville') == 'Tanger' || $client->ville == 'Tanger' ? 'selected' : '' }}>
                                        Tanger</option>
                                    <option value="Autre"
                                        {{ old('ville') == 'Autre' || $client->ville == 'Autre' ? 'selected' : '' }}>
                                        Autre</option>
                                </select>
                                @error('ville')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-8" id="autre_ville_div" style="display: none">
                                <label for="autre_ville" class="inline-block mb-2 text-base font-medium">Autre ville</label>
                                <input type="text" id="autre_ville" name="autre_ville"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Autre city"
                                    value="{{ old('ville') ? old('autre_ville') : $client->autre_ville }}">
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="type_client" class="inline-block mb-2 text-base font-medium">Type de
                                    client</label>
                                <select required
                                    class="form-input border-slate-300 focus:outline-none focus:border-custom-500"
                                    id="type_client" name="type_client" data-choices data-choices-sorting-false>
                                    <option value="">Choisir un type</option>
                                    <option value="particulier" @selected(old('type_client') === 'particulier' || $client->type_client->value === 'particulier')>
                                        Particulier
                                    </option>
                                    <option value="entreprise" @selected(old('type_client') === 'entreprise' || $client->type_client->value === 'entreprise')>
                                        Entreprise
                                    </option>
                                </select>

                                @error('type_client')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-8" id="entreprise_name_div" style="display: none">
                                <label for="entreprise_name" class="inline-block mb-2 text-base font-medium">Entreprise
                                    Name</label>
                                <input type="text" id="entreprise_name" name="entreprise_name"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="entreprise name"
                                    value="{{ old('entreprise_name', $client->entreprise_name) }}">
                            </div><!--end col-->

                        </div><!--end grid-->
                        <div class="flex justify-end mt-6 gap-x-4">
                            <button type="submit"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create</button>
                        </div>
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/pages/pages-account-setting.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var villeSelect = document.getElementById('ville');
            var autreVilleDiv = document.getElementById('autre_ville_div');
            var autreVilleInput = document.getElementById('autre_ville');

            // Fonction pour afficher ou masquer le champ de saisie en fonction de la sélection
            function toggleAutreVilleInput() {
                if (villeSelect.value === 'Autre') {
                    autreVilleDiv.style.display = 'block';
                    autreVilleInput.setAttribute('name', 'ville');
                    autreVilleInput.setAttribute('required', 'required');
                    villeSelect.removeAttribute('name');
                    villeSelect.removeAttribute('required');

                } else {
                    autreVilleDiv.style.display = 'none';
                    villeSelect.removeAttribute('name');
                    autreVilleInput.removeAttribute('required');
                    villeSelect.setAttribute('name', 'ville');
                    villeSelect.setAttribute('required', '');
                }
            }

            toggleAutreVilleInput();

            villeSelect.addEventListener('change', function() {
                toggleAutreVilleInput();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typeSelect = document.getElementById('type_client');
            var entrepriseDiv = document.getElementById('entreprise_name_div');
            var entrepriseInput = document.getElementById('entreprise_name');

            function toggleEntrepriseNameInput() {
                if (typeSelect.value === 'entreprise') {
                    //
                    entrepriseDiv.style.display = 'block';
                    entrepriseInput.setAttribute('required', 'required');
                    entrepriseInput.setAttribute('name', 'entreprise_name');
                } else {
                    entrepriseDiv.style.display = 'none';
                    entrepriseInput.removeAttribute('required');
                    entrepriseInput.removeAttribute('name');
                    typeSelect.setAttribute('required', '')
                }
            }

            // Appeler la fonction pour afficher ou masquer le champ de saisie lorsque la page est chargée
            toggleEntrepriseNameInput();

            // Écouter les changements dans la liste déroulante de la ville
            typeSelect.addEventListener('change', function() {
                // Appeler la fonction pour afficher ou masquer le champ de saisie
                toggleEntrepriseNameInput();
            });
        });
    </script>
@endpush
