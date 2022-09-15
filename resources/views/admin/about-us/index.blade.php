<x-admin-layout>
    @section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- @can('home-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Uy rasmilari jadvali") }}</h5>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHomeImmage">{{ __("Qo'shish") }}</button>
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
                <table class="table table-bordered table-striped" id="table-1">
                  <thead>
                    <tr>
                        <th class="w-25"> # </th>
                        <th>Rasmi</th>
                        <th class="w-25">Amallar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                    <tr class="odd">
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{ $item->header_image }}" width="100px" alt="" srcset=""></td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editHomeImage{{$item->id}}"><i class="fas fa-edit"></i></button>
                            {{-- @can('home-delete') --}}
                            <form action="{{route('admin.about-us.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @include('admin.about-us.edit')

                   @endforeach

                   @include('admin.about-us.create')
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection
</x-admin-layout>