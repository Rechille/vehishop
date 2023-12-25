<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Branch::all();
    }

    public function update(BranchRequest $request, string $id)
        

    {
        $validated = $request->validated();
        
       $branch = Branch::findOrFail($id);
       $branch->update($validated);

        return $branch;
        
    }

    // public function store ()
    public function store(Request $request)
    {

        {
         $branch = Branch::create([
            'name'      => $request->name,
            'location'   => $request->location,
                        
        ]);

        return $branch;
        };
    }


  
     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Branch::findorfail($id);
    }
    
    

    public function destroy(string $id)
    {
        $branch = Branch::findorfail($id);

        $branch->delete();

        return $branch;
    }
}

