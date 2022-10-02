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
        $airport = DB::table('airports')->get();
    	

        if (request('search')) {
            $airport =  DB::table('airports')->where('pavadinimas', 'like', '%' . request('search') . '%')->get();
            if ($airport->isEmpty())
            {
                return redirect('airport')->with('search', 'Profile updated!');
            }
        }



        return view('airport' , ['country' => $country,'airport' => $airport]);
    }
    public function view()
    {
        $country = DB::table('countries')->get();
    	return view('create-airport' , ['country' => $country]);   
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pavadinimas' => 'required',
            'air_id' => 'required',
        ]);

        $airport = new airport;
        $airport->pavadinimas = $request->input('pavadinimas');
        $airport->airline_id = $request->input('air_id');
        $airport->kordinatesY = $request->input('lat');
        $airport->kordinatesX = $request->input('lng');
        
        $airport->save();
        return redirect('airport')->with('status', 'Profile updated!');
    }
    public function edit(Request $request, $id)
    {
        $country = DB::table('countries')->get();
        $airport = DB::table('airports')->where('id',$id )->get();  
    	return view('airport-edit',['country' => $country,'airport' => $airport,"id" => $id]);
    }
    public function airportsView(Request $request, $id)
    {
        $country = DB::table('countries')->get();
        $airport = DB::table('airports')->where('id',$id )->get();  

    	return view('airport-view',['country' => $country,'airport' => $airport, 'id'=> $id]);
    }
    public function update(Request $request)
    {

        $airport = new airport;
        $airport->pavadinimas = $request->input('pavadinimas');
        $airport->airline_id = $request->input('air_id');
        $airport->kordinatesY = $request->input('lat');
        $airport->kordinatesX = $request->input('lng');
        $airport->id = $request->input('getid');

        if ($airport->pavadinimas != null) {
            
            DB::table('airports')
                ->where('id', $airport->id)  // find id
                ->update(array('pavadinimas' => $airport->pavadinimas = $request->input('pavadinimas')));  
        };

        if ($airport->airline_id != null) {
            
            DB::table('airports')
                ->where('id', $airport->id)  // find id
                ->update(array('airline_id' => $airport->airline_id = $request->input('air_id')));  
        };

        if ($airport->kordinatesY != null && $airport->kordinatesX != null  ) {
            
            DB::table('airports')
                ->where('id', $airport->id)  // find id
                ->update(array('kordinatesX' => $airport->kordinatesX = $request->input('lng'))); 
                 
            DB::table('airports')
                ->where('id', $airport->id)  // find id
                ->update(array('kordinatesY' => $airport->kordinatesY = $request->input('lat')));  
        }
        return redirect('airport')->with('status', 'Profile updated!');
    }

    public function destroy($id){
        $data= Airport::find($id);
        $data->delete();
        return redirect('/airport');
    }

    public function viewlinkAirline($id)
    {
        $airline = DB::table('airline')->get();
    	return view('airport-airline' , ['airline' => $airline, "id" => $id]);   
    }

    public function  storeAirportLinkAirline(Request $request, $id)
    {
        $airport = new airport;
        $airport->airline = $request->input('airline');
   
        $airport->id = $request->input('getid');
        if ($airport->airline != null) {
            
            DB::table('airports')
                ->where('id', $airport->id)  // find id
                ->update(array('airline' => $airport->airline = $request->input('airline')));  
        };

        return redirect('airport')->with('status', 'Profile updated!');
    }

    public function  unlinkAirline($id)
    {
        DB::table('airports')
        ->where('id', $id)  // find id
        ->update(array('airline' => null));  
    	return redirect('airport')->with('status', 'Profile updated!');
    }

    public function  search()
    {
        DB::table('airports')
        ->where('id', $id)  // find id
        ->update(array('airline' => null));  
    	return redirect('airport')->with('status', 'Profile updated!');
    }


    

 
}
