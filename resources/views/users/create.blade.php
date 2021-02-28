@extends('layouts.base')
@section('main-content')

<div class="row mt-3">
    <div class="col">
        <h1 class="h1 text-primary text-center">{{__("User account creation")}}</h1>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul style="list-style-type: none;" class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row bt-3">
        <div class="col-sm-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="pediatrician" class="input-group-text">{{__("Pediatrician")}}</label></div>
                    @if (old('pediatrician') != null)
                    <select name="pediatrician" id="pediatrician" class="custom-select" required aria-required="true">
                        @if ($userRole == 'A')
                            <option value="0" @if (old('pediatrician') == "0")
                                selected
                            @endif>{{__("None")}}</option>
                            @foreach ($pediatricians as $index => $pediatrician)
                            <option value="{{$pediatrician->id}}" @if (old('pediatrician') == $pediatrician->id)
                                selected
                            @endif>{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                            @endforeach
                        @else    
                            @foreach ($pediatricians as $index => $pediatrician)
                            <option value="{{$pediatrician->id}}" @if (old('pediatrician') == $pediatrician->id)
                                selected
                            @endif>{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                            @endforeach
                        @endif
                    </select>
                    @else    
                    <select name="pediatrician" id="pediatrician" class="custom-select" required aria-required="true">
                        @if ($userRole == 'A')
                            <option value="0" selected>{{__("None")}}</option>
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
                    @endif
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="role" class="input-group-text">{{__("Role")}}</label></div>
                    <select name="role" id="role" class="custom-select" required aria-required="true">
                        @if (old('role') != null)
                            @foreach ($roles as $index => $role)
                            <option value="{{$role}}" @if (old('role') == $role)
                                selected
                            @endif>{{$role}}</option>
                            @endforeach
                        @else    
                            @foreach ($roles as $index => $role)
                            <option value="{{$role}}" @if ($index == 0)
                                selected
                            @endif>{{$role}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="name" class="input-group-text">{{__("Name")}}</label></div>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" required aria-required="true" placeholder="Cognome Nome" aria-placeholder="Cognome Nome">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="email" class="input-group-text">{{__("E-Mail Address")}}</label></div>
                    <input type="email" class="form-control" required aria-required="true" name="email" value="{{old('email')}}" id="email" placeholder="email@example.com" aria-placeholder="email@example.com">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="password" class="input-group-text">Password&nbsp;<button class="btn btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="{{__("Password rules")}}" data-content="{{__("The password must contain between 8 and 20 charaters and must contain numbers, lowercase and uppercase letters and at least one of the following symbols: [@#$%^&-+=()")}}"></button></label></div>
                    <input type="password" class="form-control" name="password" id="password" required aria-required="true">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="password_confirmation" class="input-group-text">{{__("Repeat password")}}</label></div>
                    <input type="password" class="form-control" required aria-required="true" name="password_confirmation" id="password_confirmation">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="birthDate" class="input-group-text">{{__("Birth date")}}</label></div>
                    <input type="date" class="form-control" name="birthDate" value="{{old('birthDate')}}" id="birthDate" required aria-required="true" >
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="fiscalCode" class="input-group-text">{{__("Fiscal code")}}</label></div>
                    <input type="text" class="form-control" name="fiscalCode" value="{{old('fiscalCode')}}" id="fiscalCode" required aria-required="true" placeholder="ABCXYZ12A34B123B" aria-placeholder="ABCXYZ12A34B123B" onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="phone" class="input-group-text">{{__("Phone number")}}</label></div>
                    <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" id="phone" required aria-required="true" placeholder="333 0123456789">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6">
            <button type="submit" class="btn btn-primary btn-block">{{__("Send")}}</button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
    $(function () {
        $("#birthDate").datetimepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('[data-toggle="popover"]').popover();
        $('.popover-dismiss').popover({
        trigger: 'focus'
        });
    })
</script> 
@endsection