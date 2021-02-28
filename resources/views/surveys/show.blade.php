@extends('layouts.base')
@section('main-content')
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
            Data compilazione - <span style="font-weight: bold" class="text-primary">{{$survey->created_at->format('d/m/Y H:i:s')}}</span>
            <br>
            Domande con risposta - <span style="font-weight: bold" class="text-primary">{{$survey->numberOfAnswers()}}</span>
            <br>
            Punteggio - <span style="font-weight: bold" class="text-primary">{{$survey->score()}}</span>
            <br>
            Data controllo - <span style="font-weight: bold" class="text-primary">{{$survey->checked_at == null ? "Non ancora controllato" : $survey->checked_at->format('d/m/Y H:i:s')}}</span>
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
    @if ($showCheckButton)    
    <div class="row">
        <div class="col col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-9">
            <a class="btn btn-block btn-primary" role="button" href="/surveys/{{$survey->id}}/setChecked">{{__("Mark as checked")}}</a>
        </div>
    </div>
    @endif
    @if ($showDeleteButton)   
    <div class="row mt-2">
        <div class="col col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-9">
            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalDelete">{{__('Delete')}}</button>
        </div>
    </div> 
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteLabel">{{__('Confirm survey deletion')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('Are you sure you want to delete the survey?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <form action="{{route('surveys.destroy', [$survey])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection