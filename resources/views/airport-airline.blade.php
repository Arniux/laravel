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
<h1 class="text-center">Pideti oro liniju bendrove</h1>
 </div>
 </div>
 </div>
 <div class="mt-2 h4 pb-2 mb-4  border-bottom border-secondary"> </div>

 <div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 ">
         
            <div class="card p-4">
            @foreach($airline as $key => $data)
            <form name="add-airport" id="add-airport" method="get" action=" {{ url('/store-airport-link-airline', [$data->id]) }}">
            @endforeach
            @csrf
 
                <label class="mb-2" for="exampleInputEmail1">Oro linijos</label>
            
                <select id="airline" name="airline" class="form-select" aria-label="Default select example" require="">
                <option selected disabled>Select</option>

                @foreach($airline as $key => $data)
                    <option value="{{$data->id}}">{{$data->pavadinimas}}</option>

                @endforeach
                
                </select>

                <input type="hidden" name="getid" value="{{ $id }}">
                <div class="text-center mt-1">
                <button type="submit" class="mt-2 btn btn-success w-25">GO</button>
                </div>
            </form>
        </div>

        
    </div>
</div>

@endsection
