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
    <th>Pavadinimas</th>
    <th>Šalis</th>
    <th>Kordinatės Y | X</th>
</tr>
 @foreach($airport as $key => $data)
    <tr>    
      <td>{{$data->pavadinimas}}</td>
      <td> {{ $return = DB::Table('countries')->where('id',$data->airline_id)->get('pavadinimas') }}</td>
      <td> {{$locationY = $data->kordinatesY}} | {{$locationX = $data->kordinatesX}}</td>
    </tr>
 @endforeach
 </table>
 </div>
 </div>
 </div>
 <div class="mt-3 h4 pb-2 mb-4  border-bottom border-secondary"> </div>

 <div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 ">
            <h1 class="text-center">Readaguoti</h1>
            <div class="card p-4">
            <form name="add-airport" id="add-airport" method="post" action="{{url('update-airport-form')}}">
            @csrf
                <div class="form-group mb-3">
                <label for="exampleInputEmail1 mb-2">Pavadinimas</label>
                <input type="text" id="pavadinimas" name="pavadinimas" class="form-control" >
                </div>
                @if ($errors->has('pavadinimas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pavadinimas') }}</strong>
                        </span>
                @endif

         
                <label for="exampleInputEmail1">Šalis</label>
            
                <select id="air_id" name="air_id" class="form-select" aria-label="Default select example">
                <option selected disabled>Select</option>

                @foreach($country as $key => $data)
                    <option value="{{$data->id}}">{{$data->pavadinimas}}</option>
                @endforeach
                
                </select>
          

                @if ($errors->has('id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>errrror</strong>
                        </span>
                @endif
               
                    <div class="container d-flex justify-content-evenly  p-1">
                        <div class="input-group input-group-sm w-25">
                             <span class="input-group-text" id="inputGroup-sizing-sm">Platuma</span>
                         <input type="text"  id="lat" name="lat" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                     <div class="input-group input-group-sm w-25">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Ilguma</span>
                       <input type="text"  id="lng" name="lng" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    </div>
                <script> var user_location = [	<?php echo $locationX ?>, 	<?php echo $locationY ?>]; </script>   
                
                 
                <div id="map"><span id="lat"></div>
                @include('map')
        
               </div>  
               <input type="hidden" name="getid" value="{{ $id }}">
                <div class="text-center mt-1">
                <button type="submit" class="btn btn-success w-25">GO</button>
                </div>
            </form>
        </div>

        
    </div>
</div>


@endsection
