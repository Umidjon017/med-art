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
                                    <a href="{{ route('admin.doctors.doctor-infos.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                                    {{-- @can('news-edit') --}}
                                        <a href="{{ route('admin.doctors.doctor-infos.edit', $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a>
                                    {{-- @endcan --}}
                                    {{-- @can('news-delete') --}}
                                        <form action="{{route('admin.doctors.doctor-infos.destroy', $item->id)}}" method="post">
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
                                        <a class="nav-link" href="#" id="ru-link">Ru</a>
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
                                        <div class="box-header"><h5> Ismi, sharifi </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->full_name !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->full_name !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Biografiyasi </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->biography !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->biography !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Mutaxasisligi </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->specification !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->specification !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Bakalavr ta'lim </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->edu_bachelor !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->edu_bachelor !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Magister ta'lim </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->edu_master !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->edu_master !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> PHD ta'lim </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->edu_phd !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->edu_phd !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Asperantura ta'lim </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->edu_asperanture !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->edu_asperanture !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5> Qo'shimcha ta'lim </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->edu_addition !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->edu_addition !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>

                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5>Shifokor mansub bo'lim</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($departments as $department)
                                                        {!! $department->translate('uz')->name !!}
                                                        {!! $department === $departments->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5>Qatnashgan operatisiyalar</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($operations as $operation)
                                                        {!! $operation->translate('uz')->title !!}
                                                        {!! $operation === $operations->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class="d-flex justify-content-between">
                                        <div class="box-header"><h5>Mukofot/Sertifikarlar</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($awards as $award)
                                                        {!! $award->title !!}
                                                        {!! $award === $awards->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                </div>
    
                                <div class="col-md-5">
                                    <div class="d-flex justify-content-center">
                                        <div class="box-header"><h2> Rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$item->image}}" width="100%">
                                        </div>
                                    </div> <hr>
                                    
                                    <div class="d-flex justify-content-center">
                                        <div class="box-header"><h2> Card Rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$item->card_image}}" width="100%">
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