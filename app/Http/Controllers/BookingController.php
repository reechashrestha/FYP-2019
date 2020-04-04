<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();

        return view('bookings', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create_bookings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=> 'required',
            'payment_id'=> 'required',
            'booking_total'=>'required',
            'booking_status'=> 'required|max:255'
        ]);

        $booking = new Booking([
            'customer_id' => $request->get('customer_id'),
            'payment_id' => $request->get('payment_id'),
            'booking_total' => $request->get('booking_total'),
            'booking_status' => $request->get('booking_status')
        ]);

        $booking->save();

        return redirect('/bookings')->with('success', 'Successfully Stored!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        return view('bookings', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        return view('crud.edit_bookings', compact('booking'));
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
        $request->validate([
            'customer_id'=> 'required',
            'payment_id'=> 'required',
            'booking_total'=>'required',
            'booking_status'=> 'required|max:255'
        ]);

        $booking = Booking::find($id);

        $booking->customer_id = $request->get('customer_id');
        $booking->payment_id = $request->get('payment_id');
        $booking->booking_total = $request->get('booking_total');
        $booking->booking_status = $request->get('booking_status');
        $booking->save();

        return redirect('/bookings')->with('success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/bookings')->with('success', 'Successfully Deleted!');
    }
}
