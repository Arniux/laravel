@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row   text-center">
        <div class="col-6">       
        <!-- <button type="button" class="btn btn-success w-25">Prideti šali</button> -->
        <a href="/create-airport" class="btn btn-success w-25">Prideti oro uosta</a>
        </div>
        <div class="col-6 d-flex justify-content-center">
          
        <select  id="airline_id" name="airline_id" class="form-select  d-flex w-25 "  aria-label="Default select example">
                <option selected disabled>Select</option>

                @foreach($country as $key => $data)
                    <option value="{{$data->id}}">{{$data->pavadinimas}}</option>
                @endforeach
                
        </select>
        
        <a href="" class="btn btn-primary w-25 ">Ieškoti</a>
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
 
 </div>
 </div>

      






@endsection
