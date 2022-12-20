<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, User $user)
    {
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect('/');
    }
}
