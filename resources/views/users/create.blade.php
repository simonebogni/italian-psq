@extends('layouts.base')
@section('main-content')

<div class="row">
    <div class="col">
        <h1 class="h1 text-primary">{{__("User account creation")}}</h1>
    </div>
</div>
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group bt-3">
                    <div class="input-group-prepend"><label for="selectPediatrician" class="input-group-text">{{__("Pediatrician")}}</label></div>
                    <select name="" id="selectPediatrician" class="custom-select">
                        @foreach ($pediatricians as $index => $pediatrician)
                        <option value="{{$pediatrician->id}}" @if ($index == 0)
                            selected
                        @endif>{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6 offset-md-6">
            <button type="submit" class="btn btn-primary btn-block">Invia</button>
        </div>
    </div>
</form>
@endsection