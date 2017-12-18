<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookingService;

class IndexController extends Controller
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
        $times = $this->_bookingService->getTimes();
        return view('welcome', compact('times', 'bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBooking(Request $request)
    {
        //
        $this->_bookingService->createBooking($request);
    }
    
}
