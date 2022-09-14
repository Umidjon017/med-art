<x-admin-layout>
    @section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- @can('home-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">Bosh menyu ma'lumotlar jadvali</h5>

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
                            <h5><i class="icon fas fa-check"></i></h5>
                            {{session('success')}}
                        </div>
                    </div>
                @endif
                @if (Session::has('warning'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
                        <h5><i class="icon fas fa-ban"></i> </h5>
                        {{session('warning')}}
                    </div>
                @endif
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-1">
                  <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th>Sarlovha(UZ)</th>
                        <th>Tavsif(UZ)</th>
                        <th>Rasmi</th>
                        <th>Amallar</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($items as $item) --}}
                    <tr class="odd">
                        <td></td>
                        <td ><td>
                        <td class="d-inline-block text-truncate" style="max-width: 400px;"><td>
    
                        <td class=""><img src="/admin/images/about-us/" width="100px" alt="" srcset=""></td>
    
                        <td class="d-flex justify-content-center ">
                            {{-- <a class="btn btn-primary" href="{{route('admin.homes.show', $item->id)}}">
                                <i class="fas fa-eye"></i>
                            </a> --}}
                            {{-- @can('home-edit')
                                <a class="btn btn-warning" href="{{route('admin.homes.edit', $item->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endcan --}}
    
                            {{-- @can('home-delete') --}}
    
                                {{-- <form action="{{route('admin.homes.destroy', $item->id)}}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form> --}}
                            {{-- @endcan --}}
                        </td>
                    </tr>
                   {{-- @endforeach --}}

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