<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
    $validated = $request->validated();

    $order = Order::create($validated);

    return $order;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateRequest $request, string $id)
    {
        $order = Order::findOrFail($id);
    
        $validated = $request->validated();
 
        $order->quantity = $validated['quantity'];
        $order->payment_method = $validated['payment_method'];

        $order->save();

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findorfail($id);

        $order->delete();

        return $order;
    }
}
