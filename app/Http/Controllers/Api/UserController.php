<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressUserRequest;
use App\Http\Requests\PasswordUserRequest;
use App\Http\Requests\PhoneUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EmailUserRequest;
use App\Http\Requests\UserImageRequest;
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
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
    }


    //email
    public function email(EmailUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->email = $validated['email'];
        
        $user->save();

        return $user;
    }

    public function password (PasswordUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->password = Hash::make($validated['password']);
        
        $user->save();

        return $user;
    }

    public function phone_number(PhoneUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();
 
        $user->phone_number = $validated['phone_number'];

        $user->save();

        return $user;
    }
    public function address(AddressUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

         $validated = $request->validated();

        $user->address = $validated['address'];

        $user->save();

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
    public function update(UpdateUserRequest $request, string $id)
    {
    
        
            $user = User::findOrFail($id);
    
            $validated = $request->validated();
     
            $user->firstname = $validated['firstname'];
            $user->lastname = $validated['lastname'];
            $user->middlename = $validated['middlename'];

    
            $user->save();
    
            return $user;

    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return $user;
    }


    public function image(UserImageRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        if(!is_null($user->image))
        {
            Storage::disk('public')->delete($user->image);
        }
        $user->image = $request->file('image')->storePublicly('images', 'public');
        
        $user->save();

        return $user;
    }
}
