<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Controllers\BookingService;

class AdminController extends Controller
{
    function __construct()
    {
        $this->_bookingService = new BookingService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = $this->_bookingService->getTodaysBookings();
        return view('admin', compact('bookings'));
    }

    public function deleteBooking(Request $request)
    {
        $this->_bookingService->delete($request);
        return redirect('/admin')->with('status', 'Booking Deleted.');;
    }
    
}
