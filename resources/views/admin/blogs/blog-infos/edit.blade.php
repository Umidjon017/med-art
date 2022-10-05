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
                            <a href="{{ route('admin.blogs.blog-infos.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Blogni tahrirlash") }}</h4>

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
                    <form action="{{route('admin.blogs.blog-infos.update', $blogs->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-5 col-lg-5">
                                    <div class="row">
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

                                    <div class="row mb-4">
                                        <img src="{{ $blogs->image }}" class="w-75" alt="">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-7 col-lg-7">
                                    <div id="uz-form">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Sarlovha (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ old('uz.title') ?: $blogs->translate('uz')->title }}">
                                                    @error('uz.title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Mavzu (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Mavzuni kiriting" name="uz[theme]" value="{{ old('uz.theme') ?: $blogs->translate('uz')->theme }}">
                                                    @error('uz.theme')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Tavsif (UZ)</label>
                                                    <textarea name="uz[description]" class="form-control" cols="30" rows="10"> {{ old('uz.description') ?: $blogs->translate('uz')->description }} </textarea>
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
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Sarlovha (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ old('ru.title') ?: $blogs->translate('ru')->title }}">
                                                    @error('ru.title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Mavzu (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Mavzuni kiriting" name="ru[theme]" value="{{ old('ru.theme') ?: $blogs->translate('ru')->theme }}">
                                                    @error('ru.theme')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Tavsif (RU)</label>
                                                    <textarea name="ru[description]" class="form-control" cols="30" rows="10"> {{ old('ru.description') ?: $blogs->translate('ru')->description }} </textarea>
                                                    @error('ru.description')
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