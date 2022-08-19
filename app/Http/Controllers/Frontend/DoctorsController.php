<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;


class DoctorsController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        return view('doctors',compact('doctors'));
    }
}
