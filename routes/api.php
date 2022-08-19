<?php

use App\Models\Doctor;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\BookingStoreRequest;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doctors', function(BookingStoreRequest $request){
    $bookings = Booking::where('admin_id',$request->admin_id)->get();
    $noBookings = Booking::whereBetween('datetime', '>');
    foreach($bookings as $bk){
        $request_date = Carbon::parse($request->datetime);
        $endTime22 = Carbon::parse($request->datetime)->addHour();
    $endTime2 = Carbon::parse($endTime22)->addMinutes(30);
    $endTime11 = Carbon::parse($bk->datetime)->addHour();
    $endTime1 = Carbon::parse($endTime11)->addMinutes(30);
    $i = 0;


}


 function addBooking(BookingStoreRequest $request)
{
    $doctors = Doctor::findOrFail($request->admin_id);
    $bookings = Booking::where('admin_id',$request->admin_id)->get();
    if($bookings){
    foreach($bookings as $bk){
        $request_date = Carbon::parse($request->datetime);
        $endTime22 = Carbon::parse($request->datetime)->addHour();
        $endTime2 = Carbon::parse($endTime22)->addMinutes(30);
        $endTime11 = Carbon::parse($bk->datetime)->addHour();
        $endTime1 = Carbon::parse($endTime11)->addMinutes(30);
        while($bk->datetime->format('Y-m-d') == $request_date->format('Y-m-d')){
            if (($request_date->between($bk->datetime,$endTime1,true) || $endTime2->between($bk->datetime,$endTime1,true))){
                return back()->with('warning','Dr. '.$doctors->name.' is busy from '.$bk->datetime.' to '.$bk->endtime.', please try another time.');
            }else{
                return back()->with('success',' Your appointment with Dr. '.$doctors->name.' has been arranged on '.$request_date->format('l jS \of F Y').' at '.$request_date->format('h:i A'));
            }
        }
    }        
    }
    
}
    
});
