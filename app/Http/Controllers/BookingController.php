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
        $vendor = User::where('remember_token', $request->token)->with('bookings')->first();

        // if(!Auth::check()){
        //     return redirect()->to('login');
        // }


        function date_range($first, $last, $step = '+1 day', $output_format = 'YYYY-MM-DD' ) {

            $dates = array();
            $current = strtotime($first);
            $last = strtotime($last);

            while( $current <= $last ) {

                $dates[] = date($output_format, $current);
                $current = strtotime($step, $current);
            }

            return $dates;
        }


        // $array = date_range($request->booking_from_date, $request->booking_to_date, $step = '+1 day', $output_format = 'Y-m-d');
        // $datesForChecking = array_slice($array, 1, -1);


        // $vendor1 = User::where('remember_token', $request->token)->with('bookings')->get();



        // $arr1 = explode(',',$vendor1[0]->freezed_dates);

        // $arr2 = [];

        // if($vendor1[0]->bookings != null){

        //     foreach($vendor1[0]->bookings as $booking_from_date){
        //         array_push($arr2, $booking_from_date->booking_from_date);
        //     }
        //     array_merge($arr1, $arr2);
        // }


        // foreach ($datesForChecking as $value) {

        //     if(in_array($value, $arr1)){
        //         return back()->with('msg', 'Please select a correct date range to book  '.$request->vendor_name);
        //     }

        // }





         //    $fromDate = strtotime($request->booking_date); // or your date as well
         //    $toDate = strtotime($request->booking_date);
         //    $days = $toDate - $fromDate;
         //    $days = $days + 1;

         //    $noOfDays = round($days / (60 * 60 * 24));
         //    if($noOfDays < 1){
         //        $noOfDays = 1;
         //        $s = '';
         //    }else{
         //     $noOfDays =  $noOfDays + 1;
         //     $s = 's';
         // }
            //dd($noOfDays);
        $sub_total = round($request->hours * $vendor->rate);
            //dd($sub_total);
        $tax = config('app.tax', 10);
        $total_amount = ($sub_total + $tax) * 100;
            //dd($total_amount);
        $description = Auth::user()->name .' hire '.$request->vendor_name.' for 1  day';

        $b_dates = "['$request->booking_date', '$request->booking_date']";

        $m2 = Mail::to($vendor->email)->cc([$admin->email])->send(new NewBooking($request, $vendor->remember_token));
        $m3 = Mail::to(Auth::user()->email)->send(new BookingConfirmation($request));

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

