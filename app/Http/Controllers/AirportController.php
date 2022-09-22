<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use DB;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = DB::table('countries')->get();
    	return view('airport' , ['country' => $country]);   
    }
    public function store()
    {
        $country = DB::table('countries')->get();
    	return view('create-airport' , ['country' => $country]);   
    }
}
