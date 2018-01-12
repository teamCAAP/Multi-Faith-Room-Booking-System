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
        $prayers = $this->getPrayers();
        return view('welcome', compact('times', 'prayers'));
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
        return redirect('/');
    }

    public function getPrayers()
    {
        return [
            [
                'id'        => 'fajr',
                'name'      => 'Fajr',
            ],
            [
                'id'        => 'zuhr',
                'name'      => 'Zuhr',
            ],
            [
                'id'        => 'asr1',
                'name'      => 'Asr (first mithl)',
            ],
            [
                'id'        => 'asr2',
                'name'      => 'Asr (second mithl)',
            ],
            [
                'id'        => 'maghrib',
                'name'      => 'Maghrib',
            ],
            [
                'id'        => 'isha',
                'name'      => 'Isha',
            ],
        ];
    }
}
