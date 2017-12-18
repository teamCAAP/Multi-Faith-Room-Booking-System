<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Multi Faith Room - Booking System</title>
        <link rel="stylesheet" href="/css/app.css">
        
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <div class="container">
                <a class="navbar-brand" href="#">Manage Bookings</a>
            </div>
        </nav>
        
        <div class="container">
            
            <legend>Bookings</legend>

            @forelse( $bookings as $booking )
                <div class="card w-100">
                    <div class="card-header">{{ $booking->time }} PM</div>
                    <div class="card-body" style="padding: 20px;">
                        <p class="card-text">Gender Specific: {{ $booking->gender }}</p>
                        <button class="btn btn-danger" data-id="{{ $booking->id }}">Delete Booking</button>
                    </div>
                </div>
            @empty
                <div class="card w-100">
                    <div class="card-body">
                        <p class="card-text">No bookings today</p>
                    </div>
                </div>
            @endforelse

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

        <script src="/js/app.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109839238-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-109839238-1');
        </script>
    </body>
</html>
