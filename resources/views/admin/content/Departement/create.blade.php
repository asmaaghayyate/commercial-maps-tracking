@extends('admin.layouts.master')

@section('title', 'Create Departement')


@section('content')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Create A Departement
                </div>
                <form action="{{ route('admin.departement.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="client">
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
