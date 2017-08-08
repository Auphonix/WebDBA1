<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class QueryController extends Controller
{
    public function create()
    {
        $user = new User;
        return view('query.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('query.create')->with('success', 'Query added
successfully');
    }
}
