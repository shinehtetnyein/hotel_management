<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{

    // public function addBooking(Request $request, $id,$price)
    
    // {
        
    //     // Validate the request inputs
    //     $request->validate([
    //         'firstName' => 'required|string',
    //         'lastName' => 'required|string',
    //         'phone' => 'required|string',
    //         'email' => 'required|email',
    //         'guest' => 'required|integer|min:1',
    //         'checkIn' => 'required|date|after_or_equal:today',
    //         'checkOut' => 'required|date|after:checkIn',
    //     ]);
    
    //     // Prepare the booking data
    //     $data = [
    //         'room_id' => $id,
    //         'first_name' => $request->firstName,
    //         'last_name' => $request->lastName,
    //         'ph_no' => $request->phone,
    //         'email' => $request->email,
    //         'guest'=>$request->guest,
    //         'check_in' => $request->checkIn,
    //         'check_out' => $request->checkOut,
    //         'price'=>$price
    //     ];
    
    //     // Check if the room is already booked within the given dates
    //     $isBooked = Booking::where('room_id', $id)
    //         ->where('check_in', '<=', $request->checkOut)
    //         ->where('check_out', '>=', $request->checkIn)
    //         ->exists();

    //         $room = Room::findOrFail($id);

    //     if ($isBooked) {
    //         return redirect()->back()->with('error', 'This room is already booked for the selected dates, please try another date.');
    //     }

        
    
    //     // Create the booking
    //     Booking::create($data);
        
    //     // dd($data);
    //     if($data){
    //         // dd($data);
    //         return view('hotel.detailsBooking',['room' => $room]);
    //      }
        
    // }



    public function addBooking(Request $request, $id, $price)
{
    // Validate the request inputs
    $request->validate([
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'guest' => 'required|integer|min:1',
        'checkIn' => 'required|date|after_or_equal:today',
        'checkOut' => 'required|date|after:checkIn',
    ]);

    // Prepare the booking data
    $data = [
        'room_id' => $id,
        'first_name' => $request->input('firstName'),
        'last_name' => $request->input('lastName'),
        'ph_no' => $request->input('phone'),
        'email' => $request->input('email'),
        'guest' => $request->input('guest'),
        'check_in' => $request->input('checkIn'),
        'check_out' => $request->input('checkOut'),
        'price' => $price,
    ];

    // Check if the room is already booked within the given dates
    $isBooked = Booking::where('room_id', $id)
        ->where('check_in', '<=', $request->input('checkOut'))
        ->where('check_out', '>=', $request->input('checkIn'))
        ->exists();

    if ($isBooked) {
        return redirect()->back()->with('error', 'This room is already booked for the selected dates, please try another date.');
    }

    // Create the booking
    Booking::create($data);

    // Retrieve the room details for the view
    $room = Room::findOrFail($id);

    return view('hotel.detailsBooking', ['room' => $room]);
}

    
    
}
