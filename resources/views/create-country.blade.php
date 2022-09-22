@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="text-center">Pridėti šali</h1>
            <div class="card p-4">
            <form name="add-country" id="add-country" method="post" action="{{url('store-country-form')}}">
            @csrf
                <div class="form-group mb-3">
                <label for="exampleInputEmail1 mb-2">Pavadinimas</label>
                <input type="text" id="pavadinimas" name="pavadinimas" class="form-control" required="">
                </div>
                @if ($errors->has('pavadinimas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pavadininas') }}</strong>
                        </span>
                @endif

                <div class="form-group ">
                <label for="exampleInputEmail1">ISO kodas</label>
                <input type="text" id="pavadinimas" name="iso" class="form-control" required="">
                </div>
                @if ($errors->has('pavadinimas'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('iso') }}</strong>
                        </span>
                @endif


    
            
                <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">GO</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
