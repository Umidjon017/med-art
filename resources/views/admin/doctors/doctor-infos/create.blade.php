<x-admin-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset('/assets/bundles/select2/dist/css/select2.min.css') }}">
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
                <div class="card">
                    <div class="row mb-2">
                        <div class="card-header col-sm-12 d-flex justify-content-between">
                            <a href="{{ route('admin.doctors.doctor-infos.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Shifokor qo'shish") }}</h4>

                            <ul class="nav nav-tabs float-sm-right">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="ru-link">{{ __("Ru") }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg-aqua-active" href="#" id="uz-link">{{ __("Uzb") }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form action="{{route('admin.doctors.doctor-infos.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label class="">Rasm</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Rasm</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                        @error('image')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="">Card Rasm</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Card Rasm</label>
                                            <input type="file" name="card_image" id="image-upload" />
                                        </div>
                                        @error('card_image')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-7 col-lg-7">
                                    {{-- Uz form --}}
                                    <div id="uz-form">
                                        <div class="form-group">
                                            <label>Ismi, sharifi (UZ)</label>
                                            <input type="text" class="form-control" placeholder="To'liq ismingizni kiriting" name="uz[full_name]" value="{{ old('uz.full_name') }}">
                                            @error('uz.full_name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Biografiyasi (UZ)</label>
                                            <textarea name="uz[biography]" class="form-control" cols="100" rows="10"> {{ old('uz.biography') }} </textarea>
                                            @error('uz.biography')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Mutaxasisligi (UZ)</label>
                                            <input type="text" class="form-control" placeholder="Mutaxasisligini kiriting" name="uz[specification]" value="{{ old('uz.specification') }}">
                                            @error('uz.specification')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        {{-- Ta'lim --}}
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group" id="dynamicAddRemoveUz">
                                                    <label> Ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Ta'limini kiriting" name="uz[moreFields[1][title]]" value="{{ old('uz.moreFields[1][title]') }}">
                                                    <button type="button" name="uz-add" id="uz-add-btn" class="btn btn-success">Add More</button>
                                                    @error('uz.moreFields[1][title]')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    {{-- Ru form --}}
                                    <div id="ru-form" class="d-none">
                                        <div class="form-group">
                                            <label >Ismi, sharifi (RU)</label>
                                            <input type="text" class="form-control" placeholder="To'liq ismingizni kiriting" name="ru[full_name]" value="{{ old('ru.full_name') }}">
                                            @error('ru.full_name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Biografiyasi (RU)</label>
                                            <textarea name="ru[biography]" class="form-control" cols="100" rows="10"> {{ old('ru.biography') }} </textarea>
                                            @error('ru.biography')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Mutaxasisligi (RU)</label>
                                            <input type="text" class="form-control" placeholder="Mutaxasisligini kiriting" name="ru[specification]" value="{{ old('ru.specification') }}">
                                            @error('ru.specification')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        {{-- Ta'lim --}}
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group" id="dynamicAddRemoveRu">
                                                    <label> Ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Ta'limini kiriting" name="ru[moreFields[1][title]]" value="{{ old('ru.moreFields[1][title]') }}">
                                                    <button type="button" name="ru-add" id="ru-add-btn" class="btn btn-success">Add More</button>
                                                    @error('ru.moreFields[1][title]')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Bo'limlarga biriktirish</label>
                                        <select name="our_service_department_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Bo'limni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach ($departments as $department )
                                                <option value="{{$department->id}}">{!! $department->translate('uz')->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Operatsiyalarga biriktirish</label>
                                        <select name="operation_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Operatsiyani tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach ($operations as $operation )
                                                <option value="{{$operation->id}}">{!! $operation->translate('uz')->title !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Mukofot/Sertifikatlarga biriktirish</label>
                                        <select name="award_doctor_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Mukofot/Sertifikatlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach ($awards as $award )
                                                <option value="{{$award->id}}">{!! $award->title !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button class="btn btn-primary"> {{ __("Yaratish") }} </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </section>
    @endsection

    @section('scripts')
        <script src="{{ asset("/assets/bundles/select2/dist/js/select2.full.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js") }}"></script>

        <script>
            $(function () {
                $('.select2').select2()
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })
            })
        </script>
        <script>
            var $uzForm = $('#uz-form');
            var $uzLink = $('#uz-link');
            var $ruForm = $('#ru-form');
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

    <script type="text/javascript">
        var i = 1;
        $("#uz-add-btn").click(function() {
            ++i;
            $("#dynamicAddRemoveUz").append('<div class="form-group"><label> Talim (UZ)</label><input type="text" class="form-control" placeholder="Talimini kiriting" name="uz[moreFields['+i+'][title]]" value="{{ old("uz.moreFields['+i+'][title]") }}"><button type="button" class="btn btn-danger remove-div-uz">Remove</button></div>');
        });
        $(document).on('click', '.remove-div-uz', function() {  
            $(this).parent('div').remove();
        });
        
        var r = 1;
        $("#ru-add-btn").click(function() {
            ++r;
            $("#dynamicAddRemoveRu").append('<div class="form-group"><label> Talim (Ru)</label><input type="text" class="form-control" placeholder="Talimini kiriting" name="ru[moreFields['+r+'][title]]" value="{{ old("ru.moreFields['+r+'][title]") }}"><button type="button" class="btn btn-danger remove-div-ru">Remove</button></div>');
        });
        $(document).on('click', '.remove-div-ru', function() {  
            $(this).parent('div').remove();
        });
    </script>
    @endsection

</x-admin-layout>