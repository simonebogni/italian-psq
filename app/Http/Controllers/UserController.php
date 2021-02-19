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
                $users = [];
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
