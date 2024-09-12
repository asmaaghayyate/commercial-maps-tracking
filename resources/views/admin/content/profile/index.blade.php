@extends('admin.layouts.master')

@section('title', 'profile')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                    Edit-Profile</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt=""
                                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ficon-library.com%2Fimages%2Fdefault-user-icon%2Fdefault-user-icon-3.jpg&f=1&nofb=1&ipt=3ef62c835b40da152fda723e6bb14e8fa2f6f11c6ce5ec2d7909b0410bbfb47d&ipo=images"><a
                                    class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{ Auth::user()->name }}</h5>
                                    <p class="main-profile-name-text">
                                        @foreach (Auth::user()->roles as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <form class="form-horizontal" action="{{ route('admin.profile.UpdateProfile') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4 main-content-label">Personal Information</div>
                        {{-- <div class="mb-4 main-content-label">Name</div> --}}
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}" placeholder="User Name">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="email" name="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <form class="form-horizontal" action="{{ route('admin.profile.resetPassword') }}" method="POST">
                    @csrf
                    {{-- @method("post") --}}
                    <div class="card-body">
                        <div class="mb-4 main-content-label">Change Password</div>
                        {{-- <div class="mb-4 main-content-label">Name</div> --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">New Password</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="password" name="new_password" class="form-control" placeholder="Password"
                                            id="newPasswordField">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                                <i class="fas fa-eye" id="toggleNewPasswordIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    @error('new_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Confirm Password</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"
                                            id="confirmPasswordField">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <script>
                        const toggleNewPassword = document.querySelector('#toggleNewPassword');
                        const newPasswordField = document.querySelector('#newPasswordField');
                        const toggleNewPasswordIcon = document.querySelector('#toggleNewPasswordIcon');
                    
                        toggleNewPassword.addEventListener('click', function () {
                            const type = newPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                            newPasswordField.setAttribute('type', type);
                            toggleNewPasswordIcon.classList.toggle('fa-eye-slash');
                        });
                    
                        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
                        const confirmPasswordField = document.querySelector('#confirmPasswordField');
                        const toggleConfirmPasswordIcon = document.querySelector('#toggleConfirmPasswordIcon');
                    
                        toggleConfirmPassword.addEventListener('click', function () {
                            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                            confirmPasswordField.setAttribute('type', type);
                            toggleConfirmPasswordIcon.classList.toggle('fa-eye-slash');
                        });
                    </script>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
@endsection
