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
        return view('welcome', compact('times'));
    }

    public function getTimes()
    {
        $times = [];
        $hours = ["12", "13", "14", "15", "16", "17"];
        $periods = ["00", "15", "30", "45"];
        foreach ($hours as $hour) 
        {
            foreach ($periods as $period) 
            {
                $times[] = [
                    "id" => "{$hour}{$period}",
                    "label" => "{$hour}.{$period} pm",
                ];
            }
        }
        return $times;
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
        $date = date("Y-m-d");
        
        $booking = new Booking();
        $booking->time = $bookingId;
        $booking->gender = $gender;
        $booking->date = $date;
        $booking->save();

        return redirect('/');
    }
}
