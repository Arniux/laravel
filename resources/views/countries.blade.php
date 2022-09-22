@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row   text-center">
        <div class="col-6">       
        <!-- <button type="button" class="btn btn-success w-25">Prideti šali</button> -->
        <a href="/create-country" class="btn btn-success w-25">Prideti šali</a>
        </div>
        <div class="col-6">
        <a href="" class="btn btn-secondary">Šalys be oro liniju</a>
        <a href="" class="btn btn-secondary">Šalys be oro liniju ir oro uostu</a>

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
