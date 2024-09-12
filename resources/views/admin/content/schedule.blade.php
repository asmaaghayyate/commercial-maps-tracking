@extends('admin.layouts.master')

@section('content')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Temps De Travaille</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="row">
        @foreach ($data as $item)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">{{ $item->day }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.EditeWorkTime' , $item) }}" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">debut de jour</label>
                                <input type="time" name="from" placeholder="Section Name" value="{{ $item->from }}"
                                    class="form-control" id="from">
                                @error('from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">termine de jour</label>
                                <input type="time" name="to" value="{{ $item->to }}" class="form-control"
                                    id="to">
                                @error('to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">debut de pause</label>
                                <input type="time" name="stop_from" value="{{ $item->stop_from }}"
                                    class="form-control" />
                                @error('stop_from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">termine de pause</label>
                                <input type="time" name="stop_to" value="{{ $item->stop_to }}" class="form-control" />
                                @error('stop_to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
