<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .error {
            color: #ae1c17;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="container my-2 w-50" >
        <a class="btn btn-danger " href="{{ url('/home') }}">
            &lt;&lt; Back
        </a>
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

</body>

</html>
