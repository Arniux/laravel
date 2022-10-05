<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Airline;
use Illuminate\Http\Request;
use DB;

class CountriesController extends Controller
{
    public function index(Request $request)
    {

        $country = DB::table('countries')->get();
       
        if (request('searchWithoutAirlines'))
        {      
            $num_rows = country::where('id', '<=', '10')->count(); // counts rows
            $check = true; // for error messages
            $country = null;
            for ($i = 1;$i < 100 ;$i++)
            {
                $airlineID = DB::Table('Airline')->where('airline_id', '=' , $i )->get();  
                if ($airlineID->isEmpty()){
                    $temp = DB::Table('countries')->where('id','=' ,$i )->get();            
                    $country = $temp->merge($country);
                    session()->now('button-glow-0', 'glow');
                }
                else {

                } 
            }
            if ($country->isEmpty()){ 
                session()->now('error-find', 'error');
                $country = DB::Table('countries')->get();  
            } 
        }

        if (request('searchWithoutAirlinesAndAirports'))
        {      
            $num_rows = country::where('id', '<=', '10')->count(); // counts rows
            $check = true; // for error messages
            $country = null;
            for ($i = 1;$i < 100 ;$i++)
            {
                $airlineID = DB::Table('Airline')->where('airline_id', '=' , $i )->get();
                $airportID = DB::Table('Airports')->where('airline_id', '=' , $i )->get();  
            
                if ($airlineID->isEmpty() && $airportID->isEmpty()){
                    $temp = DB::Table('countries')->where('id','=' ,$i )->get();            
                    $country = $temp->merge($country);
                    session()->now('button-glow-1', 'glow');
                }
                else {

                } 
            }
            if ($country->isEmpty()){ 
                session()->now('error-find-1', 'error');
                $country = DB::Table('countries')->get();  
            } 

        }

        return view('countries' , ['country' => $country,] );
    }
    public function store(Request $request)
    {
    	$validated = $request->validate([
            'pavadinimas' => 'required|max:15',
            'iso' => 'required|max:10',
        ]);
        $country = new Country;
        $country->pavadinimas = $request->input('pavadinimas');
        $country->iso = $request->input('iso');
        $country->save();
        return redirect('countries')->with('status', 'Updated1');
    }
    public function edit(Request $request, $id)
    {
        $key = $request->key;
        echo $key;
        $result = DB::Table('countries')->where('id',$id )->get();  
    	return view('country-edit',['result' => $result, "id" => $id ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'pavadinimas' => 'required|max:15',
            'iso' => 'max:10',
        ]);

        $country = new country;
        $country->pavadinimas = $request->input('pavadinimas');
        $country->iso = $request->input('iso');
        $country->id = $request->input('getid');
        $countryid = 9;

        if ($country->pavadinimas != null) {
            
            DB::table('countries')
                ->where('id', $country->id)  // find id
                ->update(array('pavadinimas' => $country->pavadinimas = $request->input('pavadinimas')));  
        };
        if ($country->iso != null) {
            
            DB::table('countries')
                ->where('id', $country->id)         
                ->update(array('iso' => $country->iso = $request->input('iso')));  
        };
        if ($country->id != null) {        
            return redirect('/countries')->with('status', 'Atnaujinta');
        };
    }

    public function destroy($id){
        $data= Country::find($id);
        $data->delete();
        return redirect('/countries');
    }

}
