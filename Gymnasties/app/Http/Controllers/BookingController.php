<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(auth()->user()->isAdmin()){
            $bookings = Booking::orderBy('created_at')->get()->load('activity','availableTime','user');
            return view('bookingsadmin', compact('bookings'));
        }
        $bookings = auth()->user()->bookings()->orderBy('created_at')->get()->load('activity','availableTime');
        return view('bookings', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Activity $activity)
    {
        $availableTimesByDate = $activity->availableTimes()->orderBy('date')->orderBy('start_time')->get()->groupBy('date');
        return view('bookings_create', compact('availableTimesByDate', 'activity'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        Booking::create($request->validated());
        
        return redirect()->route('bookings.index')->with('message', 'Booking created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {   
        auth()->user()->isAdmin() ? $booking->update($request->validated()) : abort(403);
        return redirect()->route('bookings.index')->with('message', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('message', 'Booking deleted successfully');
    }
}
