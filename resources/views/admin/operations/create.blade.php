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
        <link rel="stylesheet" href="{{ asset("assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/bundles/bootstrap-daterangepicker/daterangepicker.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/bundles/jquery-selectric/selectric.css") }}">
    @endsection

    @section('content')
        <section class="section">
        <div class="section-body">
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row mb-2">
                        <div class="card-header col-sm-12 d-flex justify-content-between">
                            <a href="{{ route('admin.operations.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Operatsiya qo'shish") }}</h4>

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
                    <form action="{{route('admin.operations.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="">Uy rasmi</label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Uy rasmi</label>
                                                    <input type="file" name="header_image" id="image-upload" accept="image/*" />
                                                </div>
                                                @error('header_image')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="">Detal rasmi</label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Detal rasmi</label>
                                                    <input type="file" name="detail_image[]" id="image-upload" multiple accept="image/*" />
                                                </div>
                                                @error('detail_image')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Uz form --}}
                                    <div id="uz-form">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Uy Sarlovha (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[header_title]" value="{{ old('uz.header_title') }}">
                                                    @error('uz.header_title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
    
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Uy izoh (UZ)</label>
                                                    <textarea name="uz[header_description]" class="form-control" rows="3" cols="10"> {{ old('uz.header_description') }} </textarea>
                                                    @error('uz.header_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Sarlovha (UZ)</label>
                                            <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ old('uz.title') }}">
                                            @error('uz.title')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">                                                
                                                <div class="form-group">
                                                    <label>Detal izoh (UZ)</label>
                                                    <textarea name="uz[detail_description]" class="form-control" rows="3" cols="10"> {{ old('uz.detail_description') }} </textarea>
                                                    @error('uz.detail_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
    
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>To'liq izoh (UZ)</label>
                                                    <textarea name="uz[full_description]" class="form-control" rows="3" cols="10"> {{ old('uz.full_description') }} </textarea>
                                                    @error('uz.full_description')
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
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Uy Sarlovha (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[header_title]" value="{{ old('ru.header_title') }}">
                                                    @error('ru.header_title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
    
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Uy izoh (RU)</label>
                                                    <textarea name="ru[header_description]" class="form-control" rows="3" cols="10"> {{ old('ru.header_description') }} </textarea>
                                                    @error('ru.header_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Sarlovha (RU)</label>
                                            <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ old('ru.title') }}">
                                            @error('ru.title')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 com-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>Detal izoh (RU)</label>
                                                    <textarea name="ru[detail_description]" class="form-control" rows="3" cols="10"> {{ old('ru.detail_description') }} </textarea>
                                                    @error('ru.detail_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 com-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>To'liq izoh (RU)</label>
                                                    <textarea name="ru[full_description]" class="form-control" rows="3" cols="10"> {{ old('ru.full_description') }} </textarea>
                                                    @error('ru.full_description')
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
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <label>Sana</label>
                                        <input type="text" name="date" class="form-control datetimepicker" placeholder="Sanani kiriting" value="{{ old('date') }}">
                                        @error('date')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Video havola</label>
                                        <input type="text" name="link_video" class="form-control" placeholder="Video havolani kiriting" value="{{ old('link_video') }}">
                                        @error('link_video')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Shifokorlarga biriktirish</label>
                                        <select name="doctor_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Shifoklarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            <option value=""> </option>
                                            @foreach ($doctors as $doctor )
                                                <option value="{{$doctor->id}}">{{$doctor->translate('uz')->full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
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
        <script src="{{ asset("/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/select2/dist/js/select2.full.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}"></script>
        <script src="{{ asset("assets/bundles/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
        <script src="{{ asset("assets/bundles/jquery-selectric/jquery.selectric.min.js") }}"></script>

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