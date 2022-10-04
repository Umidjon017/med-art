<x-admin-layout>
    
    @section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card"> <br>
                        <div class="row mb-2">
                            <div class="card-header col-sm-6">
    
                                <div class=" d-flex justify-content-center">
                                    <a href="{{ route('admin.doctors.award.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                                    {{-- @can('news-edit') --}}
                                        <a href="{{ route('admin.doctors.award.edit', $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a>
                                    {{-- @endcan --}}
                                    {{-- @can('news-delete') --}}
                                        <form action="{{route('admin.doctors.award.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  style="display: inline" type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                                O'chirish
                                            </button>
                                        </form>
                                    {{-- @endcan --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-5">
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Nomi </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>  {!! $item->title !!}  </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Izoh </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>  {!! $item->description !!}  </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                    
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Taqdirlangan shifokorlar </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($awarded_doctors as $ad)
                                                        {!! $ad->translate('uz')->full_name !!}
                                                        {!! $ad === $awarded_doctors->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                </div>
    
                                <div class="col-md-5">
                                    <div class=" d-flex justify-content-center">
                                        <div class="box-header"><h2> Rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$item->image}}" width="100%">
                                        </div>
                                    </div> <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    
</x-admin-layout>