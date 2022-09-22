<?php

namespace App\Http\Controllers;
use App\Models\Airline;
use Illuminate\Http\Request;
use DB;

class AirlinesController extends Controller
{
    public function view()
    {
        $country = DB::table('countries')->get();
        $airline = DB::table('airline')->get();
        $airlines = airline::all();
    	return view('airlines' , ['country' => $country,'airline' => $airline]);
    }

    public function index()
    {
        $country = DB::table('countries')->get();
    	return view('create-airlines' , ['country' => $country]);
    }
    public function store(Request $request)
    {
    	$validated = $request->validate([
            'pavadinimas' => 'required|string|max:15',
            'id' => 'required|max:10',
        ]);
        $airline = new Airline;
        $airline->pavadinimas = $request->input('pavadinimas');
        $airline->airline_id = $request->input('id');
        $airline->save();
        return redirect('airlines')->with('status', 'Profile updated!');
    }
    public function edit(Request $request, $id)
    {
        $key = $request->key;
        echo $key;
        $result = DB::Table('airline')->where('id',$id )->get();  
        $country = DB::table('countries')->get();
    	return view('airlines-edit',['result' => $result,'country' => $country, "id" => $id ]);
    }

    public function destroy($id){
        $data= Airline::find($id);
        $data->delete();
        return redirect('/airlines');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'pavadinimas' => 'max:15',
            'airline_id' => 'max:10',
        ]);

        $airline = new airline;
        $airline->pavadinimas = $request->input('pavadinimas');
        $airline->airline_id = $request->input('airline_id');
        $airline->id = $request->input('getid');
        $airlineid = 9;

        if ($airline->pavadinimas != null) {
            
            DB::table('airline')
                ->where('id', $airline->id)  // find id
                ->update(array('pavadinimas' => $airline->pavadinimas = $request->input('pavadinimas')));  
        };
        if ($airline->airline_id != null) {
            
            DB::table('airline')
                ->where('id', $airline->id)         
                ->update(array('airline_id' => $airline->airline_id = $request->input('airline_id')));  
        };
        if ($airline->id != null) {        
            return redirect('/airlines')->with('status', 'Atnaujinta');
        };
    }
    

}
