@extends('layout')

@section('content')
    <div class="container my-5 w-50 card">

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <h1 class="title text-center" style="font-family:monospace">All Offers</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('messages.Offer Name') }}</th>
                    <th scope="col">{{ __('messages.Offer Price') }}</th>
                    <th scope="col">{{ __('messages.Offer details') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <th scope="row">{{ $offer->id }}</th>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->price }}</td>
                        <td>{{ $offer->details }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
