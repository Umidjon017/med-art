<x-admin-layout>

    @section('css')
        <style>
            .bg-aqua-active{
                background-color: #6777ef;
                border-color: transparent !important;
                color: #fff !important;
            }
        </style>
    @endsection
    
    @section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card"> <br>
                        <div class="row mb-2">
                            <div class="card-header col-sm-6">
    
                                <div class=" d-flex justify-content-center">
                                    <a href="{{ route('admin.our-service.departments.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                                    {{-- @can('news-edit') --}}
                                        <a href="{{ route('admin.our-service.departments.edit', $items->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a>
                                    {{-- @endcan --}}
                                    {{-- @can('news-delete') --}}
                                        <form action="{{route('admin.our-service.departments.destroy', $items->id)}}" method="post">
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
                            <div class="col-sm-6">
                                <ul class="nav nav-tabs float-sm-right " >
                                    <li class="nav-item">
                                        <a class="nav-link " href="#" id="ru-link">Ru</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-aqua-active" href="#" id="uz-link">Uzb</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-5">        
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Nomi (UZ)</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $items->translate('uz')->name !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $items->translate('ru')->name !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Tavsif (UZ)</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $items->translate('uz')->description !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $items->translate('ru')->description !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> To'liq tavsif (UZ)</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $items->translate('uz')->full_description !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $items->translate('ru')->full_description !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                    
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5>Bo'lim shifokorlari</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($doctors as $doctor)
                                                        {!! $doctor->translate('uz')->full_name !!}
                                                        {!! $doctor === $doctors->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    {{-- <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Meta sarlovha </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>  {!! $items->meta_title !!}  </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Meta tavsif </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>  {!! $items->meta_description !!}  </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Meta kalitso'z (keywords) </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>  {!! $items->meta_keywords !!}  </h6>
                                            </div>
                                        </div>
                                    </div> <hr> --}}
                                </div>
    
                                <div class="col-md-5">
                                    <div class="d-flex justify-content-center">
                                        <div class="box-header"><h2> Ikon rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$items->icon}}" style="width: 100%">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="box-header"><h2> Rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$items->image}}" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    
    @section('scripts')
        <script>
            var $uzForm = $('.uz-form');
            var $ruForm = $('.ru-form');
            var $uzLink = $('#uz-link');
            var $ruLink = $('#ru-link');
            $uzLink.click(function() {
                $uzLink.addClass('bg-aqua-active');
                $uzForm.removeClass('d-none');
                $ruLink.removeClass('bg-aqua-active');
                $ruForm.addClass('d-none');
            });
            $ruLink.click(function() {
                $ruLink.addClass('bg-aqua-active');
                $ruForm.removeClass('d-none');
                $uzLink.removeClass('bg-aqua-active');
                $uzForm.addClass('d-none');
            });
        </script>
    @endsection
    
    </x-admin-layout>