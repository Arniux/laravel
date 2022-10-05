@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row   text-center">
        <div class="col-6">       
        <!-- <button type="button" class="btn btn-success w-25">Prideti šali</button> -->
        <a href="/create-country" class="btn btn-success w-25">Prideti šali</a>
        </div>
        <div class="col-6">
          <style> 
          form {
              box-sizing: border-box;
              padding: 0;
              border-radius: 0;
              background-color: hsl(0, 0%, 100%);
              border: 0;
              display: inline;
              grid-template-columns: 1fr 1fr;
            }
          </style>

    @if (session('button-glow-0'))
          <a class="btn btn-primary" href="{{ url('/countries') }}">Šalys be oro linijų</a>
    @else 
    <form class="">
          <input type="hidden" class="form-control  w-25" name="searchWithoutAirlines" value="1"   type="search" placeholder="Pavadinimas" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Šalys be oro linijų</button>
    </form>
    @endif

    @if (session('button-glow-1'))
          <a class="btn btn-primary" href="{{ url('/countries') }}">Šalys be oro liniju ir oro uostu</a>
    @else 
    <form class="">
          <input type="hidden" class="form-control  w-25" name="searchWithoutAirlinesAndAirports"  value="1" type="search" placeholder="Pavadinimas" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Šalys be oro liniju ir oro uostu</button>
     </form>
    @endif
 

 
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
 @if (session('error-find'))
          <div class="alert alert-danger  text-center">
              Šalių be oro linijų nėra
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

 <table>
 <tr>
    <th>Pavadinimas</th>
    <th>ISO</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

 @foreach($country as $key => $data)
    <tr>    
      
      <td>{{$data->pavadinimas}}</td>
      <td>{{$data->iso}}</td> 
      <td><a href="{{ url('/country-edit', [$data->id]) }}" class="btn btn-warning"> Readeguoti</a> </td> 
      <td><a href="{{ url('/country-delete', [$data->id]) }}" class="btn btn-danger"> Ištrinti</a></td> 
    </tr>
 @endforeach
 </table>

 </div>
 </div>
 </div>

      






@endsection
