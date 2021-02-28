@extends('layouts.email')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h1 text-center text-primary">Italian PSQ - Creazione account</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Benvenuto sul portale Italian PSQ!</p>
            <p>Il Suo account è stato creato con successo dal Suo pediatra o dell'amministratore di sistema.</p>
            <p>Per accedere al sistema può cliccare sul link riportato qui di seguito:</p>
        </div>
    </div>
    <div class="row">
        <div class="col justify-content-center align-items-center">
            <a href="http://italian-psq.herokuapp.com/">http://italian-psq.herokuapp.com/</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Di seguito riepiloghiamo i Suo dati e segnaliamo che la password temporanea assegnataLe da chi ha creato l'account dovrà essere cambiata obbligatoriamente al primo accesso.</p>
            <ul style="list-style: none;">
                <li>Indirizzo email: {{$user->email}}</li>
                <li>Password temporanea: {{$temporary_password}}</li>
                <li>Nome: {{$user->name}}</li>
                <li>Ruolo: {{$user->role == 'A' ? "Admin" : ($user->role == 'P' ? "Pediatra" : "Paziente")}}</li>
                <li>Codice Fiscale: {{$user->fiscal_code}}</li>
                <li>Data di nascita: {{$user->birth_date}}</li>
                <li>Numero di telefono: {{$user->phone_number}}</li>
                <li></li>
            </ul>
            <p>- Lo staff di Italian PSQ</p>
        </div>
    </div>
</div>
@endsection