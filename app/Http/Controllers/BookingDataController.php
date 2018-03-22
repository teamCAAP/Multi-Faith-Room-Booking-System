<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookingService;

class BookingDataController extends Controller
{
    //
    public function index(BookingService $bookingService){
        $data = $bookingService->getAllData();
        return view('booking-data', $data);
    }
}
