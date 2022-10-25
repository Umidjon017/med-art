<x-admin-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset('/assets/bundles/select2/dist/css/select2.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset("/assets/bundles/datatables/datatables.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">
    @endsection

    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                    {{-- @can('news-create') --}}
                        <div class="card-header d-flex justify-content-between">
                            <h5 align="center">Sertifikatlar jadvali</h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAward">{{ __("Qo'shish") }}</button>
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
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomi</th>
                                    <th>Tavsif</th>
                                    <th>Rasmi</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr class="odd">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{!! $item->title !!}</td>
                                    <td>{!! $item->description !!}</td>

                                    <td><img src="{{ $item->image }}" width="200rem"></td>

                                    <td class="d-flex justify-content-center ">
                                        <a class="btn btn-primary" href="{{route('admin.doctors.award.show', $item->id)}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        {{-- @can('news-edit') --}}
                                            <a class="btn btn-warning" href="{{route('admin.doctors.award.edit', $item->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        {{-- @endcan --}}
                                        {{-- @can('news-delete') --}}
                                            <form action="{{route('admin.doctors.award.destroy', $item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach

                            @include('admin.doctors.awards.create')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script src="{{ asset("/assets/bundles/select2/dist/js/select2.full.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/datatables/datatables.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/jquery-ui/jquery-ui.min.js") }}"></script>
        <script src="{{ asset("/assets/js/page/datatables.js") }}"></script>
    @endsection

</x-admin-layout>