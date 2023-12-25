<?php

namespace App\Http\Controllers\Api;

use App\Models\Cars;
use App\Http\Requests\CarRequest;
use App\Http\Controllers\Controller;
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

    $cars = Cars::create($validated);

    return $cars;
   }
    
    //  {
    //         $cars = Cars::create([
    //             'manufacturer' => $request->manufacturer,
    //             'model' => $request->model,
    //             'price' => $request->price,
    //             'vin' => $request->vin,
    //             'description' => $request->description,
    //             'imageURL' => $request->imageURL,
    //             'branchID' => $request->branchID,   
    //         ]);

    //         return $cars;
    //     }
    

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
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cars = Cars::findorfail($id);

        $cars->delete();

        return $cars;
    }
}
