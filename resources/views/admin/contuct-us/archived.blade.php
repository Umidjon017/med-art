<x-admin-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset("assets/bundles/datatables/datatables.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">
    @endsection
    
    @section('content')
    <div class="row">

      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mb-0">
          <div class="card-body">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/contuct-us') ? 'active' : ''  }}"
                  href="{{ route('admin.contuct-us.table.index') }}">
                    {{ __("Barchasi") }}
                    <span class="badge badge-white">{{ count($items) }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/contuct-us/archived') ? 'active' : ''  }}"
                  href="{{ route('admin.contuct-us.archived') }}">
                  {{ __("Javob berilganlar") }}
                  <span class="badge badge-white">{{ count($trashed) }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Mijozlar jadvali</h4>

              <a class="btn btn-success" href="{{ route('admin.contuct-us.restore.all') }}">{{ __("Barchasini qaytarish") }}</a>
            </div>
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
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>№</th>
                      <th>Ism-sharifi</th>
                      <th>Telefon raqami</th>
                      <th>Sanasi</th>
                      <th>Amallar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($trashed as $item)
                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $item->full_name !!}</td>
                        <td>{!! $item->phone_number !!}</td>
                        {{-- <td>{!! $item->created_at->format('h:m:s | d-M-Y') !!}</td> --}}
                        <td>{!! $item->created_at->format('d-M-Y | h:i:s') !!}</td>
                        <td class="d-flex justify-content-center">
                            {{-- @can('news-delete') --}}
                            <form action="{{route('admin.contuct-us.restore', $item->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Qaytarish
                                    <i class="far fa-window-restore"></i>
                                </button>
                            </form>

                            <form action="{{route('admin.contuct-us.forcedelete', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    O'chirish
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script src="{{ asset("assets/bundles/datatables/datatables.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/dataTables.buttons.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/buttons.flash.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/jszip.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/pdfmake.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/vfs_fonts.js") }}"></script>
        <script src="{{ asset("assets/bundles/datatables/export-tables/buttons.print.min.js") }}"></script>
        <script src="{{ asset("assets/js/page/datatables.js") }}"></script>
    @endsection
</x-admin-layout>