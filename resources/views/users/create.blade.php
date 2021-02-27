@extends('layouts.base')
@section('main-content')

<div class="row mt-3">
    <div class="col">
        <h1 class="h1 text-primary text-center">{{__("User account creation")}}</h1>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row bt-3">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="pediatrician" class="input-group-text">{{__("Pediatrician")}}</label></div>
                    <select name="pediatrician" id="pediatrician" class="custom-select" required aria-required="true">
                        @if ($userRole == 'A')
                            <option value="null" selected>{{__("None")}}</option>
                            @foreach ($pediatricians as $index => $pediatrician)
                            <option value="{{$pediatrician->id}}">{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                            @endforeach
                        @else    
                            @foreach ($pediatricians as $index => $pediatrician)
                            <option value="{{$pediatrician->id}}" @if ($index == 0)
                                selected
                            @endif>{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="role" class="input-group-text">{{__("Role")}}</label></div>
                    <select name="role" id="role" class="custom-select" required aria-required="true">
                        @foreach ($roles as $index => $role)
                        <option value="{{$role}}" @if ($index == 0)
                            selected
                        @endif>{{$role}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="name" class="input-group-text">{{__("Name")}}</label></div>
                    <input type="text" class="form-control" name="name" id="name" required aria-required="true" placeholder="Cognome Nome" aria-placeholder="Cognome Nome">
                </div>
            </fieldset>
        </div>
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="email" class="input-group-text">{{__("E-Mail Address")}}</label></div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" aria-placeholder="email@example.com">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="password" class="input-group-text">Password</label></div>
                    <input type="password" class="form-control" name="password" id="password" required aria-required="true">
                </div>
            </fieldset>
        </div>
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="passwordRepeat" class="input-group-text">{{__("Repeat password")}}</label></div>
                    <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="birthDate" class="input-group-text">{{__("Birth date")}}</label></div>
                    <input type="date" class="form-control" name="birthDate" id="birthDate" required aria-required="true" >
                </div>
            </fieldset>
        </div>
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="fiscalCode" class="input-group-text">{{__("Fiscal code")}}</label></div>
                    <input type="text" class="form-control" name="fiscalCode" id="fiscalCode" placeholder="ABCXYZ12A34B123B" aria-placeholder="ABCXYZ12A34B123B">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="phone" class="input-group-text">{{__("Phone number")}}</label></div>
                    <input type="tel" class="form-control" name="phone" id="phone" required aria-required="true" placeholder="333 0123456789">
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
<script>
    $("#birthDate").datetimepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
</script>
@endsection