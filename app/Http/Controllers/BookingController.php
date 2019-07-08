<?php

namespace App\Http\Controllers;

use App\Booking;
use Auth;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\User;

use App\Mail\NewBooking;
use App\Mail\BookingConfirmation;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    public function sendMailToAll(Request $request){

        $admin = User::where('user_role', 'admin')->first();
        $vendor = User::find($request->vendor_id);
        //dd($vendor);
        $sub_total = round($request->hours * $vendor->rate);
        $tax = config('app.tax', 10);
        $total_amount = ($sub_total + $tax) * 100;
        $description = Auth::user()->name .' hire '.$request->vendor_name.' for 1  day';
        $b_dates = "['$request->booking_date', '$request->booking_date']";

        //dd($request);
        $m2 = Mail::to($vendor->email)->cc([$admin->email])->send(new NewBooking($request, $request->user_token));
        $m3 = Mail::to(Auth::user()->email)->send(new BookingConfirmation($request, $request->vendor_token));

        $newBooking = Booking::create([
            'user_id' => $vendor->id,
            'client_id' => Auth::id(),
            'client_name' => Auth::user()->name,
            'client_phone' => Auth::user()->phone,
            'booking_dates' => $b_dates,
            'booking_from_date' => $request->booking_date,
            'booking_to_date' => $request->booking_date,
            'days' => 1,
            'hours' => $request->hours,
            'unit_price' => $vendor->rate,
            'sub_total' => $sub_total,
            'tax' => $tax,
            'total_amount' => $total_amount,
            'description' => $description
        ]);












        if($newBooking){

            $updtBooking = Booking::where('id', $newBooking->id)->update(['booking_status' => 1]);

            return back()->with('msg', 'You have successfully booked  '.$request->vendor_name);
        }

        

    }

}

