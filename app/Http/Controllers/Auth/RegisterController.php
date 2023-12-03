<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('web.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::query()->create($request->all());
        return redirect()->route('home');
    }
}
