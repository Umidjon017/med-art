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
                                    <a href="{{ route('admin.operations.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                                    {{-- @can('news-edit') --}}
                                        <a href="{{ route('admin.operations.edit', $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a>
                                    {{-- @endcan --}}
                                    {{-- @can('news-delete') --}}
                                        <form action="{{route('admin.operations.destroy', $item->id)}}" method="post">
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
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Sarlovha (UZ) </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->title !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->title !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Detal izoh (UZ) </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->detail_description !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->detail_description !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
    
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> To'liq izoh (UZ) </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active uz-form">
                                                <h6> {!! $item->translate('uz')->full_description !!} </h6>
                                            </div>
                                            <div class="tab-pane active ru-form d-none">
                                                <h6> {!! $item->translate('ru')->full_description !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5>Qatnashgan shifokorlar</h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6>
                                                    @foreach ($attended_doctors as $doctors)
                                                        {!! $doctors->translate('uz')->full_name !!}
                                                        {!! $doctors === $attended_doctors->last() ? "" : "<hr/>" !!}
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
            
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Sana </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6> {!! $item->date !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                    
                                    <div class=" d-flex justify-content-between">
                                        <div class="box-header"><h5> Video havola </h5></div>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <h6> {!! $item->link_video !!} </h6>
                                            </div>
                                        </div>
                                    </div> <hr>
                                </div>
    
                                <div class="col-md-5">
                                    <div class=" d-flex justify-content-center">
                                        <div class="box-header"><h2> Uy rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <img src="{{$item->header_image}}" width="100%">
                                        </div>
                                    </div>

                                    <div class=" d-flex justify-content-center">
                                        <div class="box-header"><h2> Detal rasmi </h2></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            @foreach($operation_images as $images)
                                                <img src="{{ $images->detail_image }}" width="100%">
                                                {!! $images == $operation_images->last() ? "" : "<hr/>" !!}
                                            @endforeach
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