<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GDS Multi Faith Room</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <div class="container">
                    <a class="navbar-brand" href="#">Multi Faith Room Booking System</a>
                </div>
            </nav>

            <br>

            <div class="card card-inverse" style="background-color: #333; border-color: #333;">
                <div class="card-block">
                    <h3 class="card-title">This is not ready for production</h3>
                    <p class="card-text">This is currently being tested. We would like to hear your feedback, please leave an ticket on our GitHub.</p>
                    <a href="https://github.com/DilwoarH/GDS-Multi-Faith-Room/issues/new" class="btn btn-primary" target="_blank">Leave Feedback</a>
                </div>
            </div>

            <br>

            @foreach ($times as $time)
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">{{ $time['label'] }}</h4>
                        <div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="gender{{$time['id']}}" value="none" autocomplete="off" checked> N/A
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="gender{{$time['id']}}" value="female" autocomplete="off"> Female Only
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="gender{{$time['id']}}" value="male" autocomplete="off"> Male Only
                                </label>
                            </div>
                            <div>
                                <a href="/book/{{$time['id']}}" class="btn btn-success">Book Slot</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>

    </body>
</html>
