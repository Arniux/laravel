@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row   text-center">
        <div class="col-12">       
        <!-- <button type="button" class="btn btn-success w-25">Prideti šali</button> -->
        <a href="/create-airlines" class="btn btn-success w-25">Prideti oro linijų bendrovė</a>
        </div>
        <!-- <button type="button" class="btn btn-secondary ">Šalys be oro liniju</button> -->
        <!-- <button type="button" class="btn btn-secondary ">Šalys be oro liniju ir oro uostu</button> -->
        </div>
    </div>
    <div class="mt-3 h4 pb-2 mb-4  border-bottom border-secondary">
</div>

<div class="container">
<style>
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #dddddd;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even) {
	  background-color: #dddddd;
	}
</style>
 <table>
 <tr>
    <th>Šalis</th>
    <th>Kompanija</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
@foreach($airline as $key => $data)
    <tr>
      
      <td>
         {{ $return = DB::Table('countries')->where('id',$data->airline_id)->get('pavadinimas') }}
    
      </td> 
      <td>{{$data->pavadinimas}}</td>

   
      <td><a href="{{ url('/airline-edit', [$data->id]) }}" class="btn btn-warning"> Readeguoti</a> </td> 
      <td><a href="{{ url('/airline-delete', [$data->id]) }}" class="btn btn-danger"> Ištrinti</a></td> 
    </tr>
 @endforeach




</table>
</div>

@endsection
