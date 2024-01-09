<?php

namespace App\Http\Controllers\Api;

use App\Models\Cars;
use App\Http\Requests\CarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cars::all();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    
   { // Retrieve the validated input data...

    $validated = $request->validated();

    $validated['imageURL'] = $request->file('imageURL')->storePublicly('cars', 'public');
    

    $cars = Cars::create($validated);


    return $cars;
   }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Cars::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
        

        {
            $validated = $request->validated();
            
           $cars = Cars::findOrFail($id);
           $cars->update($validated);
    
            return $cars;
            
        }

    public function image(CarRequest $request, string $id)

        {
            $cars = Cars::findOrFail($id);
    
            if(!is_null($cars->imageURL))
            {
                Storage::disk('public')->delete($cars->imageURL);
            }
            
            $cars->imageURL = $request->file('imageURL')->storePublicly('cars', 'public');
            
            $cars->save();
    
            return $cars;
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cars = Cars::findOrFail($id);

        if(!is_null($cars->imageURL))
        {
            Storage::disk('public')->delete($cars->imageURL);
        }

        $cars->delete();
        return $cars;
    }
}
