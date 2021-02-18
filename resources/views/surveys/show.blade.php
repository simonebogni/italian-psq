@extends('layouts.base')
@section('main-content')
<div class="container">
    <h2 class="h2 underlinedElement">Dettagli paziente</h2>
    <div class="row">
        <div class="col">
            Nome - <span style="font-weight: bold" class="text-primary">{{$survey->user->name}}</span>
            <br>
            {{__('Birth date')}} - <span style="font-weight: bold" class="text-primary">{{$survey->user->birth_date->format('d/m/Y')}}</span>
            <br>
            Età - <span style="font-weight: bold" class="text-primary">{{$survey->user->age()}}</span>
            <br>
            {{__('E-Mail Address')}} - <span style="font-weight: bold" class="text-primary">{{$survey->user->email}}</span>
            <br>
            {{__('Phone number')}} - <span style="font-weight: bold" class="text-primary">{{$survey->user->phone_number}}</span>
            <br>
            {{__('Fiscal code')}} - <span style="font-weight: bold" class="text-primary">{{Str::upper($survey->user->fiscal_code)}}</span>
        </div>
    </div>
    <h2 class="h2 underlinedElement mt-5">Questionario</h2>
    <div class="row">
        <div class="col">
            Data compilazione - <span style="font-weight: bold" class="text-primary">{{$survey->created_at->format('d/m/Y')}}</span>
            <br>
            Domande con risposta - <span style="font-weight: bold" class="text-primary">{{$survey->numberOfAnswers()}}</span>
            <br>
            Punteggio - <span style="font-weight: bold" class="text-primary">{{$survey->score()}}</span>
            <br>
            Data controllo - <span style="font-weight: bold" class="text-primary">{{$survey->checked_at == null ? "Non ancora controllato" : $survey->checked_at->format('d/m/Y')}}</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Domanda</th>
                        <th scope="col">Risposta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questionArray as $question)
                    <tr>
                        <td>{{$question["question"]}}</td>
                        <td class="font-weight-bold 
                        @switch($question["answer"])
                            @case("No")
                                text-success
                                @break
                            @case("Sì")
                                text-danger
                                @break
                            @default
                                text-primary
                        @endswitch
                        ">{{$question["answer"]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection