@extends('layouts.base')
@section('main-content')
<div class="row">
    <div class="col">
        <h2 class="h2 text-center text-primary">@if (auth()->user()->role == 'A')
            Utenti
        @else
            I miei pazienti
        @endif</h2>
    </div>
</div>
<div class="row">
    @foreach($users as $user)
    <div class="col-12 col-sm-6 col-md-4 mt-2">
        <div class="card underlinedElement-top" style="height: 100%;">
            <div class="card-body">
                <h5 class="card-title h5 text-primary" style="font-weight: bold">{{$user->name}}</h5>
                <ul class="card-ul-list">
                    <li>{{__('Role')}}: {{$user->role == 'A' ? __('Admin') : ($user->role == 'P' ? __('Pediatrician') : __('User'))}}</li>
                    <li>{{__('E-Mail Address')}}: <span style="font-weight: bold" class="text-primary">{{$user->email}}</span></li>
                    <li>{{__('Phone number')}}: <span style="font-weight: bold" class="text-primary">{{$user->phone_number}}</span></li>
                    <li>{{__('Fiscal code')}}: <span style="font-weight: bold" class="text-primary">{{Str::upper($user->fiscal_code)}}</span></li>
                    <li>{{__('Birth date')}}: <span style="font-weight: bold" class="text-primary">{{$user->birth_date->format('d/m/Y')}}</span></li>
                </ul>
                <a href="/users/{{$user->id}}" class="btn btn-primary">Vedi profilo</a>
            </div>
          </div>
    </div>
    @endforeach
</div>
@endsection
