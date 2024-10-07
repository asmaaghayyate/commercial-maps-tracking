@extends('admin.layouts.master')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@section('title', 'Create Client')


@section('content')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Notifications</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                List</span>
        </div>
    </div> </div>
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- @foreach (\Illuminate\Notifications\DatabaseNotification::whereNull('read_at')->get() as $item)
                <div class="main-notification-list Notification-scroll">
                <a class="d-flex p-3 border-bottom" href="{{ route('admin.command.show', $item->data['id']) }}">
                    <div class="notifyimg bg-pink">
                        <i class="la la-file-alt text-white"></i>
                    </div>
        

                    <div class="ml-3">
                            <h5 class="notification-label mb-1">
                                
                             {{$item->data['title']}} : {{$item->data['commercial']}}
                            
                            </h5>
                         
                            <div class="notification-subtext">{{$item->created_at}}</div>
                    </div>
         
                    
                 </a>
                 </div>
              @endforeach
 --}}

              <div class="table-responsive">
                @php
                    $columns = ['Commercial', 'date','Action'];
                @endphp
                <table class="table table-hover mb-0 text-md-nowrap">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                         

             @foreach (Auth::user()->notifications()->get() as $item)
                            <tr>
                                <td>{{$item->data['commercial']}}</td>
                               
                                <td >{{$item->created_at}}</td>
                                <td >
                   
                                   <a href="{{ route('admin.command.show', $item->data['id']) }}" class="btn btn-warning btn-sm"
                                                style="margin-right: 5px"><i class="fa-solid fa-eye "></i></a>
                            </td>
                           </tr>
                       
                           @endforeach
                       
                   </table>

            </div>
        </div>
    </div>
@endsection
