<?php

namespace App\Http\Controllers;

use App\Models\UserSession;
use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = UserSession::with('user')->get();
        return view('admin_page.dashboard.sessions', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSession $userSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSession $userSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserSession $userSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSession $userSession)
    {
        //
    }
}
