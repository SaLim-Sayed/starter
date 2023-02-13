@extends('layout')

@section('content')
    <div class="card  my-5  container">
        <div class="alert alert-success text-center" id="success_msg" style="display: none;">
            تم الحفظ بنجاح
        </div>
        <div class="container my-2 w-50  text-center">
    
            <h1 class="title text-center">{{ __('messages.Addd your Offer') }}</h1>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form id="offerForm" method="POST" class="container card" action="{{ route('ajax.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('messages.Offer Name en') }}</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }} ">
                        @error('name_en')
                            <small class="form-text text-danger  text-center">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>{{ __('messages.Offer Name ar') }}</label>
                        <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }} ">
                        @error('name_ar')
                            <small class="form-text text-danger  text-center">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('messages.Offer Price') }}</label>
                        <input type="number" name="price" class="form-control">
                        @error('price')
                            <small class="form-text text-danger  text-center">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>{{ __('messages.choose image') }}</label>
                        <input type="file" name="photo" class="form-control">
                        @error('photo')
                            <small class="form-text text-danger  text-center">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('messages.Offer details en') }}</label>
                    <input type="text" name="details_en" class="form-control" value="{{ old('details_en') }} ">
                    @error('details_en')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
    
                </div>
                <div class="form-group">
                    <label>{{ __('messages.Offer details ar') }}</label>
                    <input type="text" name="details_ar" class="form-control" value="{{ old('details_ar') }} ">
                    @error('details_ar')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
    
                <button id="save_offer" class="btn btn-primary">{{ __('messages.Save Offer') }}</button>
            </form>
        </div>
    </div>
@stop



@section('scripts')
    <script>
        $(document).on('click', '#save_offer', function(e) {
            e.preventDefault();
            /* $('#photo_error').text('');
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#price_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text(''); */
            var formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('ajax.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@endsection
