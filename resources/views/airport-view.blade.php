@extends('layouts.app')

@section('content')

<div class="container text-center">
@foreach($airport as $key => $data)
             <h1>{{$data->pavadinimas}}</h1>
             {{$locationY = $data->kordinatesY}} | {{$locationX = $data->kordinatesX}} 
@endforeach
</div>
 <div class="mt-3 h4 pb-2 mb-4  border-bottom border-secondary"> </div>

 <div class="container">
    <div class="row justify-content-center ">
        <div class="col-6 text-center">
        @foreach($airport as $key => $data)
             <h2> Pavadinimas: {{$data->pavadinimas}}</h2>
       
           <h2> Šalis: {{ $return = DB::Table('countries')->where('id',$data->airline_id)->get('pavadinimas') }}
            @endforeach </h2>
            <h2> Oro linijų sarašas:   </h2>

        </div>
        <div class="col-6">
                <script> var user_location = [<?php echo $locationX ?>, 	<?php echo $locationY ?>]; </script>   
                <div id="map">
                    <span id="lat">
                </div>
                @include('map')
        </div>

        
    </div>
</div>


@endsection
