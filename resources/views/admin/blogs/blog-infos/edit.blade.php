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
                                                    <label>Sarlovha 1 (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title_1]" value="{{ old('uz.title_1') ?: $blogs->translate('uz')->title_1 }}">
                                                    @error('uz.title_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Sarlovha 2 (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title_2]" value="{{ old('uz.title_2') ?: $blogs->translate('uz')->title_2 }}">
                                                    @error('uz.title_2')
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
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 1 (UZ)</label>
                                                    <textarea name="uz[description_1]" class="form-control" cols="30" rows="10"> {{ old('uz.description_1') ?: $blogs->translate('uz')->description_1 }} </textarea>
                                                    @error('uz.description_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 2 (UZ)</label>
                                                    <textarea name="uz[description_2]" class="form-control" cols="30" rows="10"> {{ old('uz.description_2') ?: $blogs->translate('uz')->description_2 }} </textarea>
                                                    @error('uz.description_2')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 3 (UZ)</label>
                                                    <textarea name="uz[description_3]" class="form-control" cols="30" rows="10"> {{ old('uz.description_3') ?: $blogs->translate('uz')->description_3 }} </textarea>
                                                    @error('uz.description_3')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 4 (UZ)</label>
                                                    <textarea name="uz[description_4]" class="form-control" cols="30" rows="10"> {{ old('uz.description_4') ?: $blogs->translate('uz')->description_4 }} </textarea>
                                                    @error('uz.description_4')
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
                                                    <label>Qo'shimcha ma'lumotlar {UZ}</label>
                                                    <input type="text" name="uz[addition_select]" class="form-control" value="{{ old('uz.addition_select') ?: $blogs->translate('uz')->addition_select }}">
                                                    @error('uz.addition_select')
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
                                                    <label>Sarlovha 1 (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title_1]" value="{{ old('ru.title_1') ?: $blogs->translate('ru')->title_1 }}">
                                                    @error('ru.title_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Sarlovha 1 (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title_2]" value="{{ old('ru.title_2') ?: $blogs->translate('ru')->title_2 }}">
                                                    @error('ru.title_2')
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
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 1 (RU)</label>
                                                    <textarea name="ru[description_1]" class="form-control" cols="30" rows="10"> {{ old('ru.description_1') ?: $blogs->translate('ru')->description_1 }} </textarea>
                                                    @error('ru.description_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 2 (RU)</label>
                                                    <textarea name="ru[description_2]" class="form-control" cols="30" rows="10"> {{ old('ru.description_2') ?: $blogs->translate('ru')->description_2 }} </textarea>
                                                    @error('ru.description_2')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 3 (RU)</label>
                                                    <textarea name="ru[description_3]" class="form-control" cols="30" rows="10"> {{ old('ru.description_3') ?: $blogs->translate('ru')->description_3 }} </textarea>
                                                    @error('ru.description_3')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Tavsif 4 (RU)</label>
                                                    <textarea name="ru[description_4]" class="form-control" cols="30" rows="10"> {{ old('ru.description_4') ?: $blogs->translate('ru')->description_4 }} </textarea>
                                                    @error('ru.description_4')
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
                                                    <label>Qo'shimcha ma'lumotlar {RU}</label>
                                                    <input type="text" name="ru[addition_select]" class="form-control" value="{{ old('ru.addition_select') ?: $blogs->translate('ru')->addition_select }}">
                                                    @error('ru.addition_select')
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
                                                <label>Video link</label>
                                                <input type="text" class="form-control" placeholder="Video linkini kiriting" name="link_video" value="{{ old('link_video') ?: $blogs->link_video }}">
                                                @error('link_video')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            {!! $blogs->link_video !!}
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