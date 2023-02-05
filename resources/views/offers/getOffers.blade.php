@extends('layout')

@section('content')
   
    <div class="container my-5 w-50 card">

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <h1 class="title text-center" style="font-family:monospace">All Offers</h1>
        @foreach ($offers as $offer)
            <hr>
            <ul style="background-color: #096fa263;border-radius:10px;border:solid black 2px">
                <li>
                    <h3 style="color: #29057d">Offer | {{ $offer->name }}</h3>
                </li>
                <ul>
                    <li>Price => {{ $offer->price }}</li>
                    <li>Details => {{ $offer->details }}</li>
                </ul>
            </ul>
        @endforeach
    </div>
@endsection
