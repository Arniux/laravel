@extends('layouts.app')

@section('content')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 ">
            <h1 class="text-center">Pridėti oro uosta</h1>
            <div class="card p-4">
            <form name="add-airport" id="add-airport" method="post" action="{{url('store-airport-form')}}">
            @csrf
                <div class="form-group mb-3">
                <label for="exampleInputEmail1 mb-2">Pavadinimas</label>
                <input type="text" id="pavadinimas" name="pavadinimas" class="form-control" required="">
                </div>
                @if ($errors->has('pavadinimas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pavadinimas') }}</strong>
                        </span>
                @endif

         
                <label for="exampleInputEmail1">Šalis</label>
            
                <select id="air_id" name="air_id" class="form-select" required="" aria-label="Default select example">
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
                         <input type="text"  id="lat" name="lat" class="form-control" required=""  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                     <div class="input-group input-group-sm w-25">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Ilguma</span>
                       <input type="text"  id="lng" name="lng" class="form-control" required=""  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    </div>
                    
                    <script> var user_location = [	23.903597, 	54.898521];  </script>  
                    
                <div id="map"><span id="lat"></div>
                @include('map')
        
               </div>  
                <div class="text-center mt-1">
                <button type="submit" class="btn btn-success w-25">GO</button>
                </div>
            </form>
        </div>

        
    </div>
</div>



@endsection
