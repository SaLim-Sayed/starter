@extends('layout')

@section('content')
    <div class="container my-2 w-50" >
        
        <h1 class="title">Addd your Offer</h1>
        <form method="POST" class="container card" action="{{ route('offer.store') }} ">
            @csrf
            <div class="form-group">
                <label>Offer Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}} " >
                @error('name')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control">
                @error('price')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group">
                <label>Offer Details</label>
                <input type="text" name="details" class="form-control" value="{{old('details')}} ">
                @error('details')
                <small  class="form-text text-danger  text-center">{{$message}}</small>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Save Offer</button>
        </form>
    </div>

@endsection