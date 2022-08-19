<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;

class ExpertisesController extends Controller
{
    public function index(){
        $expertises = Expertise::all();
        return view('expertises',compact('expertises'));
    }
}
