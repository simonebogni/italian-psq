@extends('layouts.base')
@section('main-content')
<div class="row">
    <div class="col">
        <h1 class="h1 text-center text-primary">Dashboard</h1>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 d-flex justify-content-center mt-3">
        <div>
            <h3 class="h3 text-primary">Il tuo stato</h3>
            <p style="margin-bottom: 0.3rem;" class="mt-2">Nome: {{$user->name}}</p>
            <p style="margin-bottom: 0.3rem;">Ruolo utente: @switch($user->role)
                @case('A')
                    <span style="font-weight: bold;" class="text-danger">Admin</span>
                    @break
                @case('P')
                    <span style="font-weight: bold;" class="text-success">Pediatra</span>
                    @break
                @default
                    <span style="font-weight: bold;" class="text-primary">Paziente</span>
            @endswitch</p>
        </div>
    </div>
    <div class="col-md-6 d-flex justify-content-center mt-3">
        <div>
            <h3 class="h3 text-primary">Dati statistici</h3>
            @switch($user->role)
                @case('A')
                <p class="mt-2" style="margin-bottom: 0.3rem;">{{$users == 1 ? "E' presente ".$users." utente" : "Sono presenti ".$users." utenti"}}</p>
                <p style="margin-bottom: 0.3rem;">{{$surveysTotal == 1 ? "E' presente ".$surveysTotal." questionario" : "Sono presenti ".$surveysTotal." questionari"}}</p>
                    @break
                @case('P')
                    <p class="mt-2" style="margin-bottom: 0.3rem;">Hai {{$patients}} pazient{{$patients == 1 ? "e": "i"}}</p>
                    <p style="margin-bottom: 0.3rem;">Hai {{$surveysNew}} {{$surveysNew == 1 ? "nuovo questionario":"nuovi questionari"}} su {{$surveysTotal}}</p>
                    @break
                @default
                <p class="mt-2" style="margin-bottom: 0.3rem;">Hai compilato {{$surveysTotal}} questionari{{$surveysTotal == 1 ? "o": ""}}</p>
            @endswitch
        </div>
    </div>
</div>
@endsection