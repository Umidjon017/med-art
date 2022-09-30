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
                            <a href="{{ route('admin.our-service.faqs.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Savollar va javoblarni tahrirlang") }}</h4>

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
                    <form action="{{route('admin.our-service.faqs.update', $faq->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div id="uz-form" >
                                <div class="form-group ">
                                    <label>Savol (UZ)</label>
                                    <input type="text" class="form-control" placeholder="Savolni kiriting" name="uz[question]" value="{{ old('uz.question') ?: $faq->translate('uz')->question }}">
                                    @error('uz.question')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group ">
                                    <label>Javob (UZ)</label>
                                    <textarea name="uz[answer]" class="form-control"> {{ old('uz.answer') ?: $faq->translate('uz')->answer }} </textarea>
                                    @error('uz.answer')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div id="ru-form" class="d-none">
                                <div class="form-group">
                                    <label>Savol (RU)</label>
                                    <input type="text" class="form-control" placeholder="Savolni kiriting" name="ru[question]" value="{{ old('ru.question') ?: $faq->translate('ru')->question }}">
                                    @error('ru.question')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group ">
                                    <label>Javob (RU)</label>
                                    <textarea name="ru[answer]" class="form-control"> {{ old('ru.answer') ?: $faq->translate('ru')->answer }} </textarea>
                                    @error('ru.answer')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
            $('textarea').addClass('summernote')
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