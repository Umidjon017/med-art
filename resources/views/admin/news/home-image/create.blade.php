{{-- Category Modal --}}
<div class="modal fade" id="addHomeImmage" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Bosh rasmni yuklash") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <ul class="nav nav-tabs float-sm-right">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="ru-link">{{ __("Ru") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-aqua-active" href="#" id="uz-link">{{ __("Uzb") }}</a>
                </li>
            </ul>

            <form action="{{ route('admin.news.home-image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class=""> {{ __("Rasm") }} </label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label"> {{ __("Rasm") }} </label>
                                    <input type="file" name="header_image" id="image-upload" />
                                    @error('header_image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div id="uz-form">
                                <div class="form-group">
                                    <label>Sarlovha (UZ)</label>
                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[header_title]" value="{{ old('uz.header_title') }}">
                                    @error('uz.header_title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label>Izoh (UZ)</label>
                                    <textarea name="uz[header_description]" class="form-control"> {{ old('uz.header_description') }} </textarea>
                                    @error('uz.header_description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div id="ru-form" class="d-none">
                                <div class="form-group">
                                    <label>Sarlovha (RU)</label>
                                    <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[header_title]" value="{{ old('ru.header_title') }}">
                                    @error('ru.header_title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label>Izoh (RU)</label>
                                    <textarea name="ru[header_description]" class="form-control"> {{ old('ru.header_description') }} </textarea>
                                    @error('ru.header_description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Yuklash") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>