<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpertiseStoreRequest;
use App\Models\Expertise;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::all();
        return view('admin.expertises.index', compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expertises.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpertiseStoreRequest $request)
    {
        Expertise::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return to_route('expertises.index');
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
        $expertises = Expertise::findOrFail($id);
        return view('admin.expertises.edit', compact('expertises'));
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
        $expertises = Expertise::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
    
 
            $expertises->update([
                'name' => $request->name,
                'email' => $request->email,
                'price' => $request->price,
            ]);
    
        return to_route('expertises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expertises = Expertise::findOrFail($id);
        $expertises->delete();
        return to_route('expertises.index');
    }
}
