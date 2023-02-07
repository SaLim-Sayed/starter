@extends('layout')

@section('content')
    <div class="container my-2 w-50" >
        
        <h1 class="title text-center">{{__('messages.Addd your Offer')}}</h1>
        <form method="POST" class="container card" action="{{ route('offer.store') }} ">
            @csrf
            <div class="form-group">
                <label>{{__('messages.Offer Name en')}}</label>
                <input type="text" name="name_en" class="form-control" value="{{old('name_en')}} " >
                @error('name_en')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>{{__('messages.Offer Name ar')}}</label>
                <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}} " >
                @error('name_ar')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>{{__('messages.Offer Price')}}</label>
                <input type="number" name="price" class="form-control">
                @error('price')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group">
                <label>{{__('messages.Offer details en')}}</label>
                <input type="text" name="details_en" class="form-control" value="{{old('details_en')}} ">
                @error('details_en')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group">
                <label>{{__('messages.Offer details ar')}}</label>
                <input type="text" name="details_ar" class="form-control" value="{{old('details_ar')}} ">
                @error('details_ar')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
        </form>
    </div>

@endsection