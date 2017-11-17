<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $times = $this->getTimes();
        return view('welcome', compact('times', 'bookings'));
    }

    public function getTimes()
    {
        $times = [];
        $hours = ["12", "13", "14", "15", "16", "17"];
        $periods = ["00", "15", "30", "45"];
        $bookings = $this->getTodaysBookings();

        foreach ($hours as $hour) 
        {
            foreach ($periods as $period) 
            {
                $time = [
                    "id" => "{$hour}{$period}",
                    "label" => "{$hour}.{$period} pm",
                    "booked" => false,
                    "gender" => false,
                ];

                foreach ($bookings as $booking) {
                    if ( $booking->time == $time['id'] )
                    {
                        $time['booked'] = true;
                        $time['gender'] = $booking->gender;
                    }
                }
                
                $times[] = $time;
            }
        }
        return $times;
    }

    public function getTodaysDate()
    {
        return date("Y-m-d");
    }

    public function getTodaysBookings()
    {
        $today = $this->getTodaysDate();
        return Booking::where('date', $today)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBooking(Request $request)
    {
        //
        $gender = $request->gender;
        $bookingId = $request->bookingId;
        $date = $this->getTodaysDate();
        
        $booking = new Booking();
        $booking->time = $bookingId;
        $booking->gender = $gender;
        $booking->date = $date;
        $booking->save();

        return redirect('/');
    }
    
}
