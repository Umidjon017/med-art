<x-admin-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset("assets/bundles/pretty-checkbox/pretty-checkbox.min.css") }}">
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
                            <a href="{{ route('admin.news.news-infos.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Yangilik qo'shish") }}</h4>

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
                    <form action="{{route('admin.news.news-infos.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
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

                                <div class="col-sm-6 col-md-8 col-lg-8">
                                    <div id="uz-form">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Sarlovha (UZ)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ old('uz.title') }}">
                                                    @error('uz.title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Tavsif (UZ)</label>
                                                    <textarea name="uz[full_description]" class="form-control" cols="30" rows="10"> {{ old('uz.full_description') }} </textarea>
                                                    @error('uz.full_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Qo'shimcha tavsif (UZ)</label>
                                                    <textarea name="uz[description_1]" class="form-control" cols="30" rows="10"> {{ old('uz.description_1') }} </textarea>
                                                    @error('uz.description_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Qo'shimcha tavsif (UZ)</label>
                                                    <textarea name="uz[description_2]" class="form-control" cols="30" rows="10"> {{ old('uz.description_2') }} </textarea>
                                                    @error('uz.description_2')
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
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Sarlovha (RU)</label>
                                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ old('ru.title') }}">
                                                    @error('ru.title')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Tavsif (RU)</label>
                                                    <textarea name="ru[full_description]" class="form-control" cols="30" rows="10"> {{ old('ru.full_description') }} </textarea>
                                                    @error('ru.full_description')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Qo'shimcha tavsif (RU)</label>
                                                    <textarea name="ru[description_1]" class="form-control" cols="30" rows="10"> {{ old('ru.description_1') }} </textarea>
                                                    @error('ru.description_1')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label>Qo'shimcha tavsif (RU)</label>
                                                    <textarea name="ru[description_2]" class="form-control" cols="30" rows="10"> {{ old('ru.description_2') }} </textarea>
                                                    @error('ru.description_2')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="section-title">Maxsusmi</div>
                                        <div class="pretty p-switch">
                                            <input type="radio" name="popularity" value="1"/>
                                            <div class="state p-primary">
                                                <label>Ha</label>
                                            </div>
                                        </div>

                                        <div class="pretty p-switch p-fill">
                                            <input type="radio" name="popularity" value="0" checked/>
                                            <div class="state p-primary">
                                                <label>Yo'q</label>
                                            </div>
                                        </div>
                                        @error('popularity')
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
                                        <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title') }}">
                                        @error('meta_title')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <label>Meta tavsif (description)</label>
                                        <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description') }}">
                                        @error('meta_description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <label>Meta kalitso'z (keywords)</label>
                                        <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ old('meta_keywords') }}">
                                        @error('meta_keywords')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

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