<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Expertise;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        $doctors = Doctor::all();
        $expertises = Expertise::all();
        return view('admin.bookings.index',compact('bookings','doctors','expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $expertises = Expertise::all();
        return view('admin.bookings.add',compact('doctors','expertises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
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
            return to_route('bookings.index')->with('success',' The appointment of Dr. '.$doctors->name.' has been arranged on '.$request_date->format('l jS \of F Y').' at '.$request_date->format('h:i A'));
        }else{
            return to_route('bookings.index')->with('success',' The appointment of Dr. '.$doctors->name.' has been arranged on '.$request_date->format('l jS \of F Y').' at '.$request_date->format('h:i A'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expertises = Expertise::orderBy('name','ASC')->get();
        $bookings = Booking::findOrFail($id);
        $doctors = Doctor::orderBy('name','ASC')->get();
        return view('admin.bookings.edit', compact('expertises','bookings','doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingStoreRequest $request, $id)
    {
        $bookings = Booking::findOrFail($id);
 
            $bookings->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'expertise_id' => $request->expertise_id,
                'admin_id' => $request->admin_id, //admin_id here is doctor_id actually
                'datetime' => $request->datetime,
                'endtime' => Carbon::parse($request->datetime)->addHour()->addMinutes(30),
            ]);
    
        return to_route('bookings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookings = Booking::findOrFail($id);
        $bookings->delete();
        return to_route('bookings.index');
    }
    
    public function GetDoctor($expertise_id){
        $doctors = Doctor::where('expertise_id',$expertise_id)->orderBy('name','ASC')->get();
        return json_encode($doctors);
    }
}
