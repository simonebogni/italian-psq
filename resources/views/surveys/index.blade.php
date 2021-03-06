@extends('layouts.base')
@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
@endsection
@section('scripts')
<script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
@endsection
@section('main-content')
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
                <th class="align-middle" data-sortable="true">{{__('Patient')}}</th>
                <th class="align-middle" data-sortable="true">{{__('E-mail Address')}}</th>
                <th class="align-middle text-center" data-sortable="true">{{__('Score')}}</th>
                <th class="align-middle text-center" data-sortable="true">{{__('Creation date')}}</th>
                <th class="align-middle text-center" data-sortable="true">{{__('Check date')}}</th>
                <th class="align-middle text-center">{{__('Actions')}}</th>
              </tr>
            </thead>
            <tbody>
                @if ($surveys->count() == 0)
                <tr>
                    <td colspan="6">{{__('No surveys to display.')}}</td>
                </tr>
                @endif
                @foreach($surveys as $survey)
                <tr class="@if($survey->score()>=0.33) table-danger @endif @if($survey->score()>=0.25 && $survey->score()<0.33) table-warning @endif">
                    <td class="align-middle">{{$role !== 'Pediatrician' ? $survey->user->name : $survey->user_name}}</td>
                    <td class="align-middle">{{$role !== 'Pediatrician' ? $survey->user->email : $survey->user_email}}</td>
                    <td class="align-middle text-center">{{$survey->score()}}</td>
                    <td class="align-middle text-center">{{$survey->created_at->format('d/m/Y H:i:s')}}</td>
                    <td class="align-middle text-center">{{$survey->checked_at == null ? "-" : $survey->checked_at->format('d/m/Y H:i:s')}}</td>
                    <td class="align-middle">
                        <a class="btn btn-outline-primary btn-block mt-2" href="/surveys/{{$survey->id}}">{{__('Details')}}</a>
                        @if($showDeleteButton)
                        <form action="{{route('surveys.destroy', [$survey])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block mt-2" data-toggle="modal" data-target="{{"#modalDelete".$survey->id}}">{{__('Delete')}}</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <div class="align-middle">
                    {{ $surveys->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="col">
                <div class="align-middle">
                    <p class="text-right text-primary">
                        {{__('Displaying')}} {{$surveys->count()}} {{__('survey(s) out of')}} {{ $surveys->total() }}.
                    </p>
                </div>
            </div>
        </div>
        @if ($showDeleteButton)
            @foreach ($surveys as $survey)
            <div class="modal fade" id="{{"modalDelete".$survey->id}}" tabindex="-1" role="dialog" aria-labelledby="{{"modelDeleteLabel".$survey->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{"modelDeleteLabel".$survey->id}}">{{__('Confirm survey deletion')}}</h5>
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
            @endforeach
        @endif
    </div>
@endsection
