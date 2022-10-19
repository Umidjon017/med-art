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
                            
                            <h4>{{ __("Shifokorni tahrirlash") }}</h4>

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
                    <form action="{{route('admin.doctors.doctor-infos.update', $doctors->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div id="uz-form">
                                        <div class="form-group">
                                            <label >Ismi, sharifi (UZ)</label>
                                            <input type="text" class="form-control" placeholder="To'liq ismingizni kiriting" name="uz[full_name]" value="{{ old('uz.full_name') ? : $doctors->translate('uz')->full_name }}">
                                            @error('uz.full_name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Biografiyasi (UZ)</label>
                                            <textarea name="uz[biography]" class="form-control" rows="3" cols="10"> {{ old('uz.biography') ? : $doctors->translate('uz')->biography }} </textarea>
                                            @error('uz.biography')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Mutaxasisligi (UZ)</label>
                                            <input type="text" class="form-control" placeholder="Mutaxasisligini kiriting" name="uz[specification]" value="{{ old('uz.specification') ? : $doctors->translate('uz')->specification }}">
                                            @error('uz.specification')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        {{-- Ta'lim uz --}}
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label> Bakalavr ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Bakalavr ta'limini kiriting" name="uz[edu_bachelor]" value="{{ old('uz.edu_bachelor') ? : $doctors->translate('uz')->edu_bachelor }}">
                                                    @error('uz.edu_bachelor')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label> Magister ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Magister ta'limini kiriting" name="uz[edu_master]" value="{{ old('uz.edu_master') ? : $doctors->translate('uz')->edu_master }}">
                                                    @error('uz.edu_master')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label> PHD ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="PHD ta'limini kiriting" name="uz[edu_phd]" value="{{ old('uz.edu_phd') ? : $doctors->translate('uz')->edu_phd }}">
                                                    @error('uz.edu_phd')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">                                                
                                                <div class="form-group">
                                                    <label> Asperantura ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Asperantura ta'limini kiriting" name="uz[edu_asperanture]" value="{{ old('uz.edu_asperanture') ? : $doctors->translate('uz')->edu_asperanture }}">
                                                    @error('uz.edu_asperanture')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label> Qo'shimcha ta'lim (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Qo'shimcha ta'limini kiriting" name="uz[edu_addition]" value="{{ old('uz.edu_addition') ? : $doctors->translate('uz')->edu_addition }}">
                                                    @error('uz.edu_addition')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Qo'shimcha izoh (UZ)</label>
                                                    <textarea name="uz[description]" class="form-control" cols="100" rows="10"> {{ old('uz.description') ?: $doctors->translate('uz')->description }} </textarea>
                                                    @error('uz.description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div id="ru-form" class="d-none">
                                        <div class="form-group">
                                            <label >Ismi, sharifi (RU)</label>
                                            <input type="text" class="form-control" placeholder="To'liq ismingizni kiriting" name="ru[full_name]" value="{{ old('ru.full_name') ? : $doctors->translate('ru')->full_name }}">
                                            @error('ru.full_name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Biografiyasi (RU)</label>
                                            <textarea name="ru[biography]" class="form-control" rows="3" cols="10"> {{ old('ru.biography') ? : $doctors->translate('ru')->biography }} </textarea>
                                            @error('ru.biography')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label> Mutaxasisligi (RU)</label>
                                            <input type="text" class="form-control" placeholder="Mutaxasisligini kiriting" name="ru[specification]" value="{{ old('ru.specification') ? : $doctors->translate('ru')->specification }}">
                                            @error('ru.specification')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        {{-- Ta'lim ru --}}
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label> Bakalavr ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Bakalavr ta'limini kiriting" name="ru[edu_bachelor]" value="{{ old('ru.edu_bachelor') ? : $doctors->translate('ru')->edu_bachelor }}">
                                                    @error('ru.edu_bachelor')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label> Magister ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Magister ta'limini kiriting" name="ru[edu_master]" value="{{ old('ru.edu_master') ? : $doctors->translate('ru')->edu_master }}">
                                                    @error('ru.edu_master')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label> PHD ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="PHD ta'limini kiriting" name="ru[edu_phd]" value="{{ old('ru.edu_phd') ? : $doctors->translate('ru')->edu_phd }}">
                                                    @error('ru.edu_phd')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label> Asperantura ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Asperantura ta'limini kiriting" name="ru[edu_asperanture]" value="{{ old('ru.edu_asperanture') ? : $doctors->translate('ru')->edu_asperanture }}">
                                                    @error('ru.edu_asperanture')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label> Qo'shimcha ta'lim (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Qo'shimcha ta'limini kiriting" name="ru[edu_addition]" value="{{ old('ru.edu_addition') ? : $doctors->translate('ru')->edu_addition }}">
                                                    @error('ru.edu_addition')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Qo'shimcha izoh (RU)</label>
                                                    <textarea name="ru[description]" class="form-control" cols="100" rows="10"> {{ old('ru.description') ?: $doctors->translate('ru')->description }} </textarea>
                                                    @error('ru.description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Bo'limga biriktirish</label>
                                                <select name="our_service_department_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Bo'limni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                    @foreach ($departments as $department )
                                                        <option value="{{$department->id}}"
                                                            @foreach($department_doctors as $dep_d)
                                                                {{ $department->id === $dep_d->id ? 'selected' : '' }}
                                                            @endforeach>
                                                            {!! $department->translate('uz')->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
        
                                            <div class="form-group">
                                                <label>Operatisiyaga biriktirish</label>
                                                <select name="operation_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Operatsiyani tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                    @foreach ($operations as $operation)
                                                        <option value="{{$operation->id}}" 
                                                            @foreach ($attended_operations as $ao)
                                                                {{ $operation->id === $ao->id ? 'selected' : '' }}
                                                            @endforeach >
                                                            {!! $operation->translate('uz')->title !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Mukofot/Sertifikatga biriktirish</label>
                                                <select name="award_doctor_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Mukofot/Sertifikatni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                    @foreach ($awards as $award)
                                                        <option value="{{$award->id}}" 
                                                            @foreach ($gethered_awards as $ga)
                                                                {{ $award->id === $ga->id ? 'selected' : '' }}
                                                            @endforeach >
                                                            {!! $award->title !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
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
                                            
                                            <div class="row mb-4">
                                                <img src="{{ $doctors->image }}" class="w-75" alt="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6">
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
                                            
                                            <div class="row mb-4">
                                                <img src="{{ $doctors->card_image }}" class="w-75" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button class="btn btn-primary"> {{ __("Saqlash") }} </button>
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
    @endsection

</x-admin-layout>