<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CarSpecificController extends Controller
{
    public function show(Request $request)
    {
        return User::findOrFail($request->user()->customerID);
    }
}
