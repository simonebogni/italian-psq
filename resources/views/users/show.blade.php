@extends('layouts.base')
@section('main-content')
<div class="container">
    @if (\Session::has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{!! \Session::get('fail') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{!! \Session::get('success') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
    @endif
    <h2 class="h2 underlinedElement">{{__("User details")}}</h2>
    <div class="row mt-5">
        <div class="col">
            <p>{{__("Name")}} - <span style="font-weight: bold" class="text-primary">{{$user->name}}</span></p>
            <p>{{__("Role")}} - <span style="font-weight: bold" class="text-primary">{{$user->role == 'A' ? __('Admin') : ($user->role == 'P' ? __('Pediatrician') : __('Patient'))}}</span></p>
            @if ($user->user_id != null)
            <p>{{__('Pediatrician')}} - <span style="font-weight: bold" class="text-primary">{{$user->ownPediatrician()->get()->first()->name}}</span></p>
            @endif
            <p>{{__("E-Mail Address")}} - <span style="font-weight: bold" class="text-primary">{{$user->email}}</span></p>
            <p>{{__("Latest password change date")}} - <span style="font-weight: bold" class="text-primary">{{$user->password_changed_at == null ? __("Password not yet changed") : $user->password_changed_at->format('d/m/Y')}}</span></p>
            <p>{{__("Birth date")}} - <span style="font-weight: bold" class="text-primary">{{$user->birth_date->format('d/m/Y')}}</span></p>
            <p>{{__("Fiscal code")}} - <span style="font-weight: bold" class="text-primary">{{Str::upper($user->fiscal_code)}}</span></p>
            <p>{{__("Phone number")}} - <span style="font-weight: bold" class="text-primary">{{$user->phone_number}}</span></p>
        </div>
    </div>
</div>
@endsection