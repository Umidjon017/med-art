{{-- Category Modal --}}
<div class="modal fade" id="addAward" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="formModal">{{ __("Sertifikatlar/Yutuqlarni kiritng") }}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('admin.doctors.award.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="">Rasm</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Rasm</label>
                                    <input type="file" name="image" id="image-upload" multiple/>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nomi</label>
                                <input type="text" class="form-control" placeholder="Nomini kiriting" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
        
                            <div class="form-group ">
                                <label>Izoh</label>
                                <textarea name="description" class="form-control"> {{ old('description') }} </textarea>
                                @error('description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group ">
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

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>