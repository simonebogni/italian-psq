@extends('layouts.base')
@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
@endsection
@section('scripts')
<script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
@endsection
@section('main-content')
    <div>
        <p>{{$role}} - {{auth()->user()->name}}</p>
    </div>
    <h1 class="h1 text-primary">
        @if ($role === 'Admin')
            Tutti i questionari
        @else
            @if ($role === 'Pediatrician')
                I questionari dei tuoi pazienti
            @else
                I tuoi questionari
            @endif
        @endif
    </h1>
    <div>
        <table 
        data-toggle="table"
        data-pagination="true"
        data-search="true"
        data-sortable="true"
        class="table table-hover table-striped">
            <thead>
              <tr>
                <th data-sortable="true">Paziente</th>
                <th data-sortable="true">Email</th>
                <th data-sortable="true">Punteggio</th>
                <th data-sortable="true">Data</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach($surveys as $survey)
                <tr class="@if($survey->score()>=0.33) table-danger @endif @if($survey->score()>=0.25 && $survey->score()<0.33) table-warning @endif">
                    <td>{{$survey->user->name}}</td>
                    <td>{{$survey->user->email}}</td>
                    <td>{{$survey->score()}}</td>
                    <td>{{$survey->created_at}}</td>
                    <td><a href="/surveys/{{$survey->id}}" class="text-primary">Dettagli</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
