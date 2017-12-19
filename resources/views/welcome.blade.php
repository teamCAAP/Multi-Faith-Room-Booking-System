@extends('includes.layout')

@section('content')
@include('includes/navbar', ['title' => 'Multi-faith room booking'])

<div class="container">
    <br>

    @include('includes/beta-warning')

    <br>

    <div class="card-group">
        @foreach ($times as $time)
            <div class="card @if($time['booked']) text-white bg-danger @endif @if($time['block_booking']) text-white bg-warning @endif">
                <div class="card-block">
                    <h4 class="card-title">{{ $time['label'] }}</h4>
                    @if($time['booked'])
                        <p class="booking-info">Gender specific: <i class="fas fa-{{ $time['gender'] }}"></i> {{ $time['gender'] }}</p>
                    @endif

                    @if($time['block_booking'])
                        <p class="booking-info">Block Booking: {{ $time['block_booking_name'] }}</p>
                    @endif
                </div>
                <div class="card-footer @if($time['booked']) text-white bg-danger @endif @if($time['block_booking']) text-white bg-warning @endif">
                    <button class="btn @if($time['booked'] or $time['block_booking']) btn-default @else btn-success @endif" data-toggle="modal" data-target="#bookingModal" data-time="{{ $time['label'] }}" data-id="{{ $time['id'] }}"
                    @if($time['booked'] or $time['block_booking']) disabled @endif
                    >
                        @if($time['booked'] or $time['block_booking']) Booked @else Book Slot @endif
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <br>

    <div class="card card-warning text-white">
        <div class="card-block">
            <h3 class="card-title">Manage Bookings</h3>
            <p class="card-text">Please use this responsibly.</p>
            <a href="/admin" class="btn btn-danger">Manage Bookings</a>
        </div>
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
                                    <input type="radio" name="gender" value="none" autocomplete="off" checked> <i class="fas fa-genderless"></i> N/A
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="gender" value="female" autocomplete="off"> <i class="fas fa-female"></i> Female Only
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="gender" value="male" autocomplete="off"> <i class="fas fa-male"></i> Male Only
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

@endsection