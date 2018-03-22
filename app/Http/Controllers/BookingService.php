<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\BlockBookings;

class BookingService extends Controller
{
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

        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
        $id = $request['booking-id'];
        $booking = Booking::find($id);
        $booking->delete();
        return;
    }

    public function getTimes()
    {
        $times = [];
        $hours = ["12", "13", "14", "15", "16", "17"];
        $periods = ["00", "15", "30", "45"];
        $bookings = $this->getTodaysBookings();
        $blockBookings = $this->getBlockBookings();
        
        foreach ($hours as $hour) 
        {
            foreach ($periods as $period) 
            {
                $time = [
                    "id" => "{$hour}{$period}",
                    "label" => "{$hour}.{$period} pm",
                    "booked" => false,
                    "gender" => false,
                    "block_booking" => false,
                    "block_booking_name" => false,
                ];
                
                foreach ($blockBookings as $booking) {
                    if ( $booking->time_slot == $time['id'] )
                    {
                        $time['block_booking'] = true;
                        $time['block_booking_name'] = $booking->name;
                    }
                }

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
        return Booking::where('date', $today)->orderBy('date', 'asc')->get();
    }

    public function getBlockBookings()
    {
        return BlockBookings::all();
    }

    public function getAllData()
    {
        return Booking::paginate();
    }

    public function getGenderStats()
    {  
        return [
            "male" => Booking::where('gender', 'male')->count(),
            "female" => Booking::where('gender', 'female')->count(),
            "none" => Booking::where('gender', 'none')->count(),
        ];
    }

}
