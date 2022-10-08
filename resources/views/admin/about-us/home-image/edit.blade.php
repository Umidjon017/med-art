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
                <div class="card">
                    <div class="row mb-2">
                        <div class="card-header col-sm-12 d-flex justify-content-between">
                            <a href="{{ route('admin.about-us.home-image.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Uy rasmini tahrirlang") }}</h4>

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

                    <form action="{{route('admin.about-us.home-image.update', $item->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
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

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <img src="{{ $item->header_image }}" style="width: 80%">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div id="uz-form">
                                        <div class="form-group">
                                            <label>Sarlovha (UZ)</label>
                                            <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ old('uz.title') ?: $item->translate('uz')->title }}">
                                            @error('uz.title')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label>Izoh (UZ)</label>
                                            <textarea name="uz[description]" class="form-control"> {{ old('uz.description') ?: $item->translate('uz')->description }} </textarea>
                                            @error('uz.description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <div id="ru-form" class="d-none">
                                        <div class="form-group">
                                            <label>Sarlovha (RU)</label>
                                            <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ old('ru.title') ?: $item->translate('ru')->title }}">
                                            @error('ru.title')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label>Izoh (RU)</label>
                                            <textarea name="ru[description]" class="form-control"> {{ old('ru.description') ?: $item->translate('ru')->description }} </textarea>
                                            @error('ru.description')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Saqlash") }}</button>
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

{{-- Brand Modal --}}
<div class="modal fade" id="editHomeImage{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> {{ __("Uy rasmini tahrirlash") }} </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.about-us.home-image.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  <div class="form-group ">
                    <label class="">{{ __("Rasm") }}</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">{{ __("Rasm") }}</label>
                        <input type="file" name="header_image" id="image-upload" />
                        @error('header_image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
  
                  <div class="row">
                    <img src="{{$item->header_image}}" width="100%">
                  </div>
  
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Saqlash") }} </button>
                  </div>
  
                </div>
            </form>
        </div>
    </div>
  </div>