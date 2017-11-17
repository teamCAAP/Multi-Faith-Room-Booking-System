<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

            <div class="card-group">
                @foreach ($times as $time)
                    <div class="card @if($time['booked']) text-white bg-danger @endif">
                        <div class="card-block">
                            <h4 class="card-title">{{ $time['label'] }}</h4>
                            @if($time['booked'])
                                <p>Gender specific: {{ $time['gender'] }}</p>
                            @endif
                            <div>
                                <button class="btn btn-success" data-toggle="modal" data-target="#bookingModal" data-time="{{ $time['label'] }}" data-id="{{ $time['id'] }}"
                                @if($time['booked']) disabled @endif
                                >Book Slot</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            
        
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Book Room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/book" method="POST">
                            <div class="form-group row">
                                <label for="bookingTime" class="col-sm-2 col-form-label">Booking Time</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bookingTime" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="gender">
                                    Gender specific:
                                </label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="gender" value="none" autocomplete="off" checked> N/A
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="gender" value="female" autocomplete="off"> Female Only
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="gender" value="male" autocomplete="off"> Male Only
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" style="padding:20px;">
                                <p class="text-muted">Please respect the gender specific booking as this may be a personal preference.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{ csrf_field() }}
                            <input type="text" class="form-control" id="bookingId" name="bookingId" value="" hidden>
                            <button type="submit" class="btn btn-success">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
