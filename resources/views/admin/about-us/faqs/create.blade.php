{{-- Category Modal --}}
<div class="modal fade" id="addFAQs" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="formModal">{{ __("Savollar va javoblarni kiritng") }}</h5>

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
            
            <form action="{{ route('admin.about-us.faqs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div id="uz-form" >
                        <div class="form-group ">
                            <label>Savol (UZ)</label>
                            <input type="text" class="form-control" placeholder="Savolni kiriting" name="uz[question]" value="{{ old('uz.question') }}">
                            @error('uz.question')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label>Javob (UZ)</label>
                            <textarea name="uz[answer]" class="form-control"> {{ old('uz.answer') }} </textarea>
                            @error('uz.answer')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div id="ru-form" class="d-none">
                        <div class="form-group ">
                            <label>Savol (RU)</label>
                            <input type="text" class="form-control" placeholder="Savolni kiriting" name="ru[question]" value="{{ old('ru.question') }}">
                            @error('ru.question')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label>Javob (RU)</label>
                            <textarea name="ru[answer]" class="form-control"> {{ old('ru.answer') }} </textarea>
                            @error('ru.answer')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>