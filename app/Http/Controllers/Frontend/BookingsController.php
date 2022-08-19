<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Booking;
use App\Http\Requests\BookingStoreRequest;
use Carbon\Carbon;

class BookingsController extends Controller
{
    public function addBooking(BookingStoreRequest $request)
    {
        $doctors = Doctor::findOrFail($request->admin_id);
        $bookings = Booking::where('admin_id',$request->admin_id)->get(); //admin_id here is doctor_id actually
        $request_date = Carbon::parse($request->datetime);
        $request_endtime = Carbon::parse($request->datetime)->addHour()->addMinutes(30);
        if($bookings){
            foreach($doctors->bookings as $bk){
                if ($request_date->between($bk->datetime,$bk->endtime) || $request_endtime->between($bk->datetime,$bk->endtime)){
                    return back()->with('warning','Dr. '.$doctors->name.' is busy from '.$bk->datetime.' to '.$bk->endtime.', please try another time.');
                }
            }
            Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'datetime' => $request->datetime,
                'endtime' => Carbon::parse($request->datetime)->addHour()->addMinutes(30),
                'admin_id' => $request->admin_id, //admin_id here is doctor_id actually
                'expertise_id' => $request->expertise_id,
            ]);
            return back()->with('success',' Your appointment with Dr. '.$doctors->name.' has been arranged on '.$request_date->format('l jS \of F Y').' at '.$request_date->format('h:i A'));
        }
    }
    public function GetDoctors($expertise_id){
        $doctors = Doctor::where('expertise_id',$expertise_id)->orderBy('name','ASC')->get();
        return json_encode($doctors);
    }
}
