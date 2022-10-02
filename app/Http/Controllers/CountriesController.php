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
        $airlineRowscount = DB::table('airline')->where('airline_id')->count(); 
        if (request('searchWithoutAirlines'))
        {   
            echo $airlineRowscount;
        }

        return view('countries' , ['country' => $country,'airlineRowscount' => $airlineRowscount] );

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
