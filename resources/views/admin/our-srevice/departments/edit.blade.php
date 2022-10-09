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
                            <a href="{{ route('admin.our-service.departments.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Bo'lim qo'shish") }}</h4>

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
                    <form action="{{route('admin.our-service.departments.update', $items->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div id="uz-form">
                                        <div class="form-group ">
                                            <label >Nomi(UZ)</label>
                                            <input type="text" class="form-control" placeholder="Nomini kiriting" name="uz[name]" value="{{ old('uz.name') ?: $items->translate('uz')->name }}">
                                            @error('uz.name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Tavsif(UZ)</label>
                                            <textarea name="uz[description]" class="form-control"> {{ old('uz.description') ?: $items->translate('uz')->description }} </textarea>
                                            @error('uz.description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>To'liq tavsif (UZ)</label>
                                            <textarea name="uz[full_description]" class="form-control"> {{ old('uz.full_description') ?: $items->translate('uz')->full_description }} </textarea>
                                            @error('uz.full_description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div id="ru-form" class="d-none">
                                        <div class="form-group">
                                            <label>Sarlovha(RU)</label>
                                            <input type="text" class="form-control" placeholder="Nomini kiriting" name="ru[name]" value="{{ old('ru.name') ?: $items->translate('ru')->name }}">
                                            @error('ru.name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Tavsif(RU)</label>
                                            <textarea name="ru[description]" class="form-control"> {{ old('ru.description') ?: $items->translate('ru')->description }} </textarea>
                                            @error('ru.description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>To'liq tavsif (RU)</label>
                                            <textarea name="ru[full_description]" class="form-control"> {{ old('ru.full_description') ?: $items->translate('ru')->full_description }} </textarea>
                                            @error('ru.full_description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Shifokorlarga biriktirish</label>
                                        <select name="doctor_info_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Shifokorni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach ($doctors as $doctor)
                                                <option value="{{$doctor->id}}"
                                                    @foreach($department_doctors as $dep_d)
                                                        {{ $doctor->id === $dep_d->id ? 'selected' : '' }}
                                                    @endforeach>
                                                    {!! $doctor->translate('uz')->full_name !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

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
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="">Ikon rasmi</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Ikon rasmi</label>
                                            <input type="file" name="icon" id="image-upload" />
                                        </div>
                                        @error('icon')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Meta sarlovha (title)</label>
                                        <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title') ?: $items->meta_title }}">
                                        @error('meta_title')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <label>Meta tavsif (description)</label>
                                        <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description') ?: $items->meta_description }}">
                                        @error('meta_description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <label>Meta kalitso'z (keywords)</label>
                                        <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ old('meta_keywords') ?: $items->meta_keywords }}">
                                        @error('meta_keywords')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <img src="{{ $items->image }}" style="width: 80%">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <img src="{{ $items->icon }}" style="width: 80%">
                                </div>
                            </div>

                            <div class="form-group mt-3">
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