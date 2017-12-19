@extends('includes.layout')

@section('content')
@include('includes/navbar', ['title' => 'Manage Bookings'])
<div class="container">

    <legend>
        <a class="btn btn-link" href="/">
            <i class="fas fa-arrow-left"></i>
            Back to bookings
        </a>
    </legend>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @forelse( $bookings as $booking )
        <div class="card w-100">
            <div class="card-header">{{ $booking->time }} PM</div>
            <div class="card-body" style="padding: 20px;">
                <p class="card-text">Gender Specific: <i class="fas fa-{{ $booking->gender }}"></i> {{ $booking->gender }}</p>
                <form action="/admin/delete-booking" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="booking-id" value="{{ $booking->id }}">
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                        Delete Booking
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="card w-100">
            <div class="card-body">
                <p class="card-text">No bookings made today</p>
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
@endsection