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
                <a class="nav-link {{ request()->is('admin/appointments/table') ? 'active' : ''  }}"
                  href="{{ route('admin.appointments.table.index') }}">
                    {{ __("Barchasi") }}
                    <span class="badge badge-white">{{ count($items) }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/appointments/archived') ? 'active' : ''  }}"
                  href="{{ route('admin.appointments.archived') }}">
                  {{ __("Javob berilganganlar") }}
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
              <h4>Buyurtmalar jadvali</h4>
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
                      <th>Qaysi bo'lim</th>
                      <th>Qaysi shifokor</th>
                      <th>Ism-sharifi</th>
                      <th>Email</th>
                      <th>Telefon raqami</th>
                      <th>Sanasi</th>
                      <th>Buyurtma kelib tushgan sana</th>
                      <th>Amallar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $item->service->translateOrNew('uz')->name !!}</td>
                        <td>{!! $item->doctor->translateOrNew('uz')->full_name !!}</td>
                        <td>{!! $item->full_name !!}</td>
                        <td>{!! $item->email !!}</td>
                        <td>{!! $item->phone_number !!}</td>
                        <td>{!! $item->date !!}</td>
                        <td>{!! $item->created_at->format('d-M-Y | H:i:s') !!}</td>
                        <td class="d-flex justify-content-center">
                            {{-- @can('news-delete') --}}
                            <form action="{{route('admin.appointments.table.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-success">
                                    Javob berildi
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </form>
                            
                            <form action="{{route('admin.appointments.forcedelete', $item->id)}}" method="post">
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