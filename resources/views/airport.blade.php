@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row   text-center">
        <div class="col-6">       
        <!-- <button type="button" class="btn btn-success w-25">Prideti šali</button> -->
        <a href="/create-airport" class="btn btn-success w-25">Prideti oro uosta</a>
        </div>
        <div class="col-6  justify-content-center ">

        <form class="d-flex justify-content-center ">
          <input class="form-control me-2 w-25" name="search"  type="search" placeholder="Pavadinimas" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Ieškoti</button>
        </form>
        <!-- <button type="button" class="btn btn-secondary ">Šalys be oro liniju</button> -->
        <!-- <button type="button" class="btn btn-secondary ">Šalys be oro liniju ir oro uostu</button> -->
        </div>
    </div>

</div>
    <div class="mt-3 h4 pb-2 mb-4  border-bottom border-secondary">
</div>
@if (session('status'))
          <div class="alert alert-success ">
              Atnaujinta
          </div>
 @endif

<div class="container ">
    <div class="row  text-center">
        <div class="col-12">
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
@if (session('search'))
          <div class="alert alert-danger ">
              Oro uosto su tokiu pavadinimu nėra
          </div>
 @endif
 <table>
 <tr>
    <th>Pavadinimas</th>
    <th>Šalis</th>
    <th>Kordinatės Y | X</th>
    <th>Kompanija</th>
    <th>Pridėti/Ištrinti bendrove</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
@foreach($airport as $key => $data)
    <tr>    
      <td> <a href="{{ url('/airport', [$data->id]) }}"> {{$data->pavadinimas}} </a></td>
      <td> {{ $return = DB::Table('countries')->where('id',$data->airline_id)->get('pavadinimas') }}</td>
      <td> {{$locationY = $data->kordinatesY}} | {{$data->kordinatesX}}</td>
      <td> {{ $return = DB::Table('airline')->where('id',$data->airline)->get('pavadinimas') }}</td>

      <td><a href="{{ url('/airport-link-airline', [$data->id]) }}" class="btn btn-success"> Pridėti</a>
       <a href="{{ url('/airport-unlink-airline', [$data->id]) }}" class="btn btn-danger"> Ištrinti</a></td> 

      <td><a href="{{ url('/airport-edit', [$data->id]) }}" class="btn btn-warning"> Readeguoti</a> </td> 
      <td><a href="{{ url('/airport-delete', [$data->id]) }}" class="btn btn-danger"> Ištrinti</a></td> 
    </tr>
 @endforeach
 </table>
 


 </div>

 
 </div>
 </div>







@endsection
