<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorStoreRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Expertise;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $expertises = Expertise::all();
        return view('admin.doctors.index', compact('doctors','expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertises = Expertise::all();
        return view('admin.doctors.add', compact('expertises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorStoreRequest $request)
    {
        if($request->file('image')){
            $image = $request->file('image')->store('public/doctors');
            Doctor::create([
                'name' => $request->name,
                'expertise_id' => $request->expertise_id,
                'email' => $request->email,
                'description' => $request->description,
                'image' => $image,
            ]);
        }else{
            Doctor::create([
                'name' => $request->name,
                'expertise_id' => $request->expertise_id,
                'email' => $request->email,
                'description' => $request->description,
            ]);
        }
        return to_route('doctors.index')->with('success','The doctor has been added successfully');
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
        $doctors = Doctor::findOrFail($id);
        $expertises = Expertise::all();
        return view('admin.doctors.edit', compact('doctors','expertises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $doctors = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'expertise_id' => 'required',
            'description' => 'required',
            'image' => 'image'
        ]);
        $image = $doctors->image;
        if($request->hasFile('image')){
            !is_null($doctors->image) && Storage::delete($doctors->image);
            $image = $request->file('image')->store('public/doctors');
        }
 
            $doctors->update([
                'name' => $request->name,
                'expertise_id' => $request->expertise_id,
                'email' => $request->email,
                'description' => $request->description,
                'image' => $image
            ]);
    
        return to_route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors = Doctor::findOrFail($id);
        if ($doctors->image){
            Storage::delete($doctors->image);
        }
        $doctors->delete();
        return to_route('doctors.index');
    }
}
