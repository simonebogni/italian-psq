@extends('layouts.base')
@section('main-content')

<form action="{{route('surveys.store')}}" method="post">
    @csrf

    <div class="row">
    @foreach ($questionArray as $couple)
    @if (count($couple) == 2)
    <div class="col-md-6">
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-6">{{$couple[0]["question"]}}</legend>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    @component('components.survey-button-group')
                        @slot('optNumber')
                        {{$couple[0]["id"]}}
                        @endslot
                        @slot('radioName')
                        {{$couple[0]["radioName"]}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-6">{{$couple[1]["question"]}}</legend>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    @component('components.survey-button-group')
                        @slot('optNumber')
                        {{$couple[1]["id"]}}
                        @endslot
                        @slot('radioName')
                        {{$couple[1]["radioName"]}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
    @else
    <div class="col-md-6">
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-6">{{$couple[0]["question"]}}</legend>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    @component('components.survey-button-group')
                        @slot('optNumber')
                        {{$couple[0]["id"]}}
                        @endslot
                        @slot('radioName')
                        {{$couple[0]["radioName"]}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
    @endif
    @endforeach
    </div>
    <div class="row">
        <div class="col col-md-6 offset-md-6">
            <button type="submit" class="btn btn-primary btn-block">Invia</button>
        </div>
    </div>
</form>
@endsection