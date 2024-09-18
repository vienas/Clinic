<?php

namespace App\Http\Controllers;

use App\Models\User;

class TeamController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('team.index', ['users' => $users]);
    }
}
