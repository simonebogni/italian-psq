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
    @if ($showDeleteButton || $showEditButton)   
    <div class="row mt-2 justify-content-end">
        @if ($showEditButton)
        <div class="col-12 col sm-6 col-md-4 col-lg-3"><a role="button" class="btn btn-primary btn-block" href="{{route('users.edit', [$user])}}">{{__('Edit account')}}</a></div>
        @endif
        @if ($showDeleteButton)  
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalDelete">{{__('Delete user account')}}</button>
        </div>
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDeleteLabel">{{__('Confirm account deletion')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('Are you sure you want to delete the user account?')}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <form action="{{route('users.destroy', [$user])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> 
    @endif
</div>
@endsection