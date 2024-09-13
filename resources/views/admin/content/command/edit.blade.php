@extends('admin.layouts.master')

@section('title', 'Edit Client')


@section('content')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Edit A Client
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
                <form action="{{ route('admin.client.update' , $client) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">name: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" placeholder="Enter user name" required=""
                                    value="{{ old('name', $client->user->name) }}" type="text" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">email: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="email" placeholder="Enter user email" required
                                    value="{{ old('email', $client->user->email) }}" type="email" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Password: </label>
                                <div class="input-group">
                                    <input class="form-control" name="password" placeholder="Enter user password"
                                        value="{{ old('password') }}" type="password" id="passwordField" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>
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

                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Adresse: <span class="tx-danger">*</span></label>
                                <textarea name="adresse" class="form-control" id="" cols="30" rows="10">{{ old('identite', $client->adresse) }}</textarea>
                                @error('adresse')
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
