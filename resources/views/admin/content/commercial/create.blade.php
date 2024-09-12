@extends('admin.layouts.master')

@section('title', 'Create Departement')


@section('content')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Create A Commercial
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.commercial.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="commercial">
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">name: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" placeholder="Enter user name" required=""
                                    value="{{ old('name') }}" type="text" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">email: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="email" placeholder="Enter user email" required
                                    value="{{ old('email') }}" type="email" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Password: <span class="tx-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" name="password" placeholder="Enter user password" required
                                        value="{{ old('password') }}" type="password" id="passwordField" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const passwordField = document.querySelector('#passwordField');
                            const toggleIcon = document.querySelector('#toggleIcon');

                            togglePassword.addEventListener('click', function(e) {
                                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordField.setAttribute('type', type);
                                toggleIcon.classList.toggle('fa-eye-slash');
                            });
                        </script>

                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Departement: <span class="tx-danger">*</span></label>
                                <select name="departement_id" class="form-control SlectBox SumoUnder">
                                    @foreach ($departements as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('departement_id') == $item->name ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Type de deplacement: <span class="tx-danger">*</span></label>
                                <select name="type_deplacement" class="form-control SlectBox SumoUnder">
                                    <option value="" disabled selected>Select type</option>
                                    <option {{ old('type_deplacement') == 'car' ? 'selected' : '' }} value="car">Car
                                    </option>
                                    <option {{ old('type_deplacement') == 'bike' ? 'selected' : '' }} value="bike">Bike
                                    </option>
                                    <option {{ old('type_deplacement') == 'public_transport' ? 'selected' : '' }}
                                        value="public_transport">Public Transport</option>
                                    <option {{ old('type_deplacement') == 'Walking' ? 'selected' : '' }} value="walking">
                                        Walking</option>
                                </select>
                                @error('type_deplacement')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">genre: <span class="tx-danger">*</span></label>
                                <select name="genre" class="form-control SlectBox SumoUnder">
                                    <option value="" disabled selected>Select genre</option>
                                    <option {{ old('type_deplacement') == 'homme' ? 'selected' : '' }} value="homme">Homme
                                    </option>
                                    <option {{ old('type_deplacement') == 'femme' ? 'selected' : '' }} value="femme">Bike
                                    </option>
                                </select>
                                @error('type_deplacement')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">type contrat: <span class="tx-danger">*</span></label>
                                <select name="type_contrat" class="form-control SlectBox SumoUnder">
                                    <option value="" disabled selected>Select type de contat</option>
                                    <option {{ old('type_contrat') == 'stage' ? 'selected' : '' }} value="stage">stage
                                    </option>
                                    <option {{ old('type_contrat') == 'travaille' ? 'selected' : '' }} value="travaille">
                                        travaille
                                    </option>
                                </select>
                                @error('type_contrat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">identité: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="identite" placeholder="Enter identite" required
                                    value="{{ old('identite') }}" type="text" />
                                @error('identite')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Adresse: <span class="tx-danger">*</span></label>
                                <textarea name="adresse" class="form-control" id="" cols="30" rows="10">{{ old('identite') }}</textarea>
                                @error('adresse')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">date debut: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="date_debut" placeholder="Enter identite" required
                                    value="{{ old('date_debut') }}" type="date" />
                                @error('date_debut')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">date fin: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="date_fin" placeholder="Enter date fin" required
                                    value="{{ old('date_fin') }}" type="date" />
                                @error('date_fin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">
                                Validate Form
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
