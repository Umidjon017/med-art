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
            <form action="{{ route('admin.doctors.home-image.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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