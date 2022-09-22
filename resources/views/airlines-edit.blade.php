@extends('layouts.app')

@section('content')

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
    <th>Šalis</th>
    <th>Kompanija</th>
</tr>

@foreach($result as $key => $data)
    <tr>    
      <td>{{$return = DB::Table('countries')->where('id',$data->airline_id)->get('pavadinimas') }}</td>
      <td>{{$data->pavadinimas}}</td> 
    </tr>
 @endforeach
 </table>
 </div>
 </div>
 </div>
 <div class="mt-3 h4 pb-2 mb-4  border-bottom border-secondary"> </div>

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <h1 class="text-center">Readaguoti</h1>
            <div class="card p-4">
            <form name="update-country-form" id="update-country" method="post" action="{{url('update-airline-form')}}">
            @csrf
                <div class="form-group mb-3">
                <label for="exampleInputEmail1 mb-2">Pavadinimas</label>
                <input type="text" id="pavadinimas" name="pavadinimas" class="form-control" >
                </div>

                @if ($errors->has('pavadinimas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pavadininas') }}</strong>
                        </span>
                @endif

                <div class="form-group ">
                <label for="exampleInputEmail1">Šalys</label>
                <select id="airline_id" name="airline_id" class="form-select"  aria-label="Default select example">
                <option selected disabled>Select</option>

                @foreach($country as $key => $data)
                    <option value="{{$data->id}}">{{$data->pavadinimas}}</option>
                @endforeach
                
                </select>
                </div>

                @if ($errors->has('id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('iso') }}</strong>
                        </span>
                @endif 
                <input type="hidden" name="getid" value="{{ $id }}">


                <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">GO</button>
                </div>
            </form>

        </div>
    </div>

@endsection
