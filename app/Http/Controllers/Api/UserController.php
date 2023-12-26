<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validated();

    $user = User::create($validated);

    return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findorfail($id);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        
       $user = User::findOrFail($id);
       $user->update($validated);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserController::findorfail($id);

        $user->delete();

        return $user;
    }

    /**
     * Update the email of specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->email = $validated['email'];
        
        $user->save();

        return $user;
    }

      /**
     * Update the phone nummber of the specified resource in storage.
     */
    public function phone_number(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->phone_number = $validated['phone_number'];

        $user->save();

        return $user;
    }

     /**
     * Update the address of the specified resource in storage.
     */
    public function address(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->address = $validated['address'];

        $user->save();

        return $user;
    }

    /**
     * Update the password of the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->password = Hash::make($validated['password']);
        
        $user->save();

        return $user;
    }

}
