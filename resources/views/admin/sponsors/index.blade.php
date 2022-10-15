<x-admin-layout>

    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- @can('brand-create') --}}
                    <div class="card-header d-flex justify-content-between">
                        <h5 align="center">Homiylar jadvali</h5>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrand">Qo'shish</button>
                    </div>
                {{-- @endcan --}}

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    <span>&times;</span>
                                </button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    {{session('success')}}
                                </h5>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('warning'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
                            <h5>
                                <i class="icon fas fa-ban"></i>
                                {{session('warning')}}
                            </h5>
                        </div>
                    @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nomi</th>
                        <th>Rasmi</th>
                        <th>Amallar</th>
                    </tr>

                    @foreach ($items as $item)
                    <tr >
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{$item->image}}"/>
                        </td>
                        <td class=" d-flex justify-content-center">

                            {{-- @can('brand-edit') --}}
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editBrand{{$item->id}}"><i class="fas fa-edit"></i></button>
                            {{-- @endcan --}}
                            {{-- @can('brand-delete') --}}
                                <form action="{{route('admin.sponsors.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger deleteCat ">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @include('admin.sponsors.edit')

                    @endforeach

                    @include('admin.sponsors.create')

                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script src="/assets/bundles/datatables/datatables.min.js"></script>
        <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/js/page/datatables.js"></script>
    @endsection
</x-admin-layout>