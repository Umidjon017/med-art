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
                            <a href="{{ route('admin.doctors.award.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>
                            
                            <h4>{{ __("Sertifikatlar/Yutuqlarni tahrirlash") }}</h4>
                        </div>
                    </div>
                    <form action="{{route('admin.doctors.award.update', $item->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
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
                                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="title" value="{{ old('title') ?: $item->title }}">
                                        @error('title')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                
                                    <div class="form-group ">
                                        <label>Izoh</label>
                                        <textarea name="description" class="form-control"> {{ old('description') ?: $item->description }} </textarea>
                                        @error('description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <img src="{{ $item->image }}" width="600rem">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="">
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
        <script src="{{ asset("/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js") }}"></script>
    @endsection

</x-admin-layout>