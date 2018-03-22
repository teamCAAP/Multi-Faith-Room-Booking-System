<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookingService;

class BookingDataController extends Controller
{
    //
    public function index(BookingService $bookingService){
        $data = $bookingService->getAllData();
        $gender_stats = $bookingService->getGenderStats();
        return view('booking-data', $data)->with('gender_stats', $gender_stats);
    }
}
