@extends('layouts.base')
@section('main-content')

<div class="row mt-3">
    <div class="col">
        <h1 class="h1 text-primary text-center">{{__("Edit user account")}}</h1>
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
<form action="{{route('users.update', [$user])}}" method="post">
    @method('PUT')
    @csrf
    @if ($loggedUserRole == 'A')
    <div class="row mt-5">
        <div class="col-sm-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="pediatrician" class="input-group-text">{{__("Pediatrician")}}</label></div>
                    <select name="pediatrician" id="pediatrician" class="custom-select" required aria-required="true">
                        <option value="0" @if ($user->user_id == null)
                            selected
                        @endif>{{__("None")}}</option>
                        @foreach ($pediatricians as $index => $pediatrician)
                        <option value="{{$pediatrician->id}}" @if ($user->user_id == $pediatrician->id)
                            selected
                        @endif>{{$pediatrician->name}} - {{$pediatrician->fiscal_code}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="role" class="input-group-text">{{__("Role")}}</label></div>
                    <select name="role" id="role" class="custom-select" required aria-required="true">
                        @foreach ($roles as $index => $role)
                        <option value="{{$role}}" @if ($user->role == $role)
                            selected
                        @endif>{{$role}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </div>
    </div>
    @endif
    <div class="row @if ($loggedUserRole != 'A')
        mt-5
    @endif">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="name" class="input-group-text">{{__("Name")}}</label></div>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" required aria-required="true" placeholder="Cognome Nome" aria-placeholder="Cognome Nome">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="email" class="input-group-text">{{__("E-Mail Address")}}</label></div>
                    <input type="email" class="form-control" required aria-required="true" name="email" value="{{$user->email}}" id="email" placeholder="email@example.com" aria-placeholder="email@example.com">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <fieldset class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"><label for="phone" class="input-group-text">{{__("Phone number")}}</label></div>
                    <input type="tel" class="form-control" name="phone" value="{{$user->phone_number}}" id="phone" required aria-required="true" placeholder="333 0123456789">
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6">
            <button type="submit" class="btn btn-primary btn-block">{{__("Update")}}</button>
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
    })
</script> 
@endsection