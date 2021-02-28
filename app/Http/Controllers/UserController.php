<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (auth()->user()->role) {
            case 'A':
                $users = User::all();
                break;
            case 'P':
                $users = User::currentUser()->get()->first()->ownUsers()->get()->all();
                break;
            default:
                abort(401, __("You don't have the right privileges!"));
                break;
        }
        
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pediatricians = [];
        $roles = [];
        $userRole = auth()->user()->role;
        switch ($userRole) {
            case 'A':
                $pediatricians = User::Pediatricians()->get();
                $roles = [__("Patient"), __("Pediatrician"), __("Admin")];
                break;
            case 'P':
                $pediatricians = User::where('id', '=', auth()->user()->id)->get();
                $roles = [__("Patient")];
                break;
            default:
                abort(401, __("You don't have the right privileges!"));
                break;
        }
        return view('users.create', [
            'userRole' => $userRole,
            'pediatricians' => $pediatricians,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pediatrician' => ['required'],
            'role' => ['required'], 
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:App\Models\User,email', 'max:255'],
            'password' => ['required', 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&-+=()])(?=\\S+$).{8, 20}$/i', 'confirmed'],
            'birthDate' => ['required', 'date'],
            'fiscalCode' => ['required', 'unique:App\Models\User,fiscal_code', 'regex:/^(?:[A-Z][AEIOU][AEIOUX]|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i'],
            'phone' => ['required', 'numeric']
        ]);
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $authorized = false;
        $edit = false;
        $loggedUser = auth()->user();
        switch ($loggedUser->role) {
            case 'A':
                $authorized = true;
                $edit = true;
                break;
            case 'P':
                if($user->ownPediatrician->id == $loggedUser->id){
                    $authorized = true;
                }
                break;
            default:
                if($user->id == $loggedUser->id){
                    $authorized = true;
                    $edit = true;
                }
                break;
        }
        if ($authorized) {
            return view('users.show', ["user" =>$user, "edit"=>$edit]);
        }
        abort(401, __("You don't have the right privileges!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
