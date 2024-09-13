@extends('admin.layouts.master')

@section('title', 'Users Home')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Command</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                    List</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a href="{{ route('admin.command.create') }}" title="Create New Commande" type="button"
                    class="btn btn-info btn-sm">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row opened -->
    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @php
                            $columns = ['Client', 'Admin', 'Commercial', 'destination name', 'Action'];
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->client?->user->name }}</td>
                                        <td>{{ $item->admin?->name }}</td>
                                        <td>{{ $item->commercial?->user->name }}</td>
                                        <td>{{ Str::limit($item->destination_name, 25, '...')  }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.command.edit', $item) }}" class="btn btn-info btn-sm"
                                                style="margin-right: 5px"><i class="fa-solid fa-pen "></i></a>

                                            <a href="{{ route('admin.command.show', $item) }}" class="btn btn-warning btn-sm"
                                                style="margin-right: 5px"><i class="fa-solid fa-eye "></i></a>

                                            <form id="delete-user-form-{{ $item->id }}"
                                                action="{{ route('admin.command.destroy', $item) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button onclick="confirmUserDelete({{ $item->id }});"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>

                                            <script>
                                                function confirmUserDelete(itemId) {
                                                    Swal.fire({
                                                        title: "Are you sure?",
                                                        text: "You won't be able to revert this!",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#3085d6",
                                                        cancelButtonColor: "#d33",
                                                        confirmButtonText: "Yes, delete it!"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-user-form-' + itemId).submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection
