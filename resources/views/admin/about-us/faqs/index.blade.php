<x-admin-layout>
    @section('css')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset("/assets/bundles/datatables/datatables.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">
        <style>
            .bg-aqua-active{
                background-color: #6777ef;
                border-color: transparent !important;
                color: #fff !important;
            }
        </style>
        <link rel="stylesheet" href="{{ asset("/assets/bundles/summernote/summernote-bs4.css") }}">
    @endsection

    @section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- @can('home-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Tez-tez So'raladigan Savollar jadvali") }}</h5>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFAQs">{{ __("Qo'shish") }}</button>
                </div>
            {{-- @endcan --}}
    
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                <span>&times;</span>
                            </button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                {{session('success')}}
                            </h5>
                        </div>
                    </div>
                @endif
                @if (Session::has('warning'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
                        <h5>
                            <i class="icon fas fa-ban"></i>
                            {{session('warning')}}
                        </h5>
                    </div>
                @endif
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Savollar</th>
                        <th>Javoblar</th>
                        <th class="w-25">Amallar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($faqs as $faq)
                    <tr class="odd">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->translate('uz')->question }}</td>
                        <td>{{ $faq->translate('uz')->answer }}</td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editFAQs{{$faq->id}}"><i class="fas fa-edit"></i></button>
                            {{-- @can('home-delete') --}}
                            <form action="{{route('admin.about-us.faqs.destroy', $faq->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @include('admin.about-us.faqs.edit')

                   @endforeach

                   @include('admin.about-us.faqs.create')
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script src="{{ asset("/assets/bundles/datatables/datatables.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("/assets/bundles/jquery-ui/jquery-ui.min.js") }}"></script>
        <script src="{{ asset("/assets/js/page/datatables.js") }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
        <script src="{{ asset('ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{ asset("/assets/bundles/summernote/summernote-bs4.js") }}"></script>
        <script src="{{ asset("/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js") }}"></script>

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