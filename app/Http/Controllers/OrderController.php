<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::latest()->paginate(5);
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'campanyId' =>"required"
            ,"deliveryGuyId"=>"required"
            ,"isPaid"=>"required"
            ,"delivaryFees"=>"required"
            ,"status"=>"required"
            ,"city"=>"required"
            ,"street"=>"required"
            ,"buildingNumber"=>"required"
            ,"floorNumber"=>"required"
            ,"apartmentNumber"=>"required"
            ,"totalPrice"=>"required"
            ,'orderDate'=>"required"
            ,"clientName"=>"required"
            ,"clienPhone"=>"required"
        ]);
        $order =Order::create($request->all());
        // return redirect("order.index");
        return redirect()->route('order.index')->with('success', 'Your order has been saved');
    }
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , Order $order)

        {
            $request->validate([
                'campanyId' =>"required"
                ,"deliveryGuyId"=>"required"
                ,"isPaid"=>"required"
                ,"delivaryFees"=>"required"
                ,"status"=>"required"
                ,"city"=>"required"
                ,"street"=>"required"
                ,"buildingNumber"=>"required"
                ,"floorNumber"=>"required"
                ,"apartmentNumber"=>"required"
                ,"totalPrice"=>"required"
                ,'orderDate'=>"required"
                ,"clientName"=>"required"
                ,"clienPhone"=>"required"
            ]);
            $order->update($request->all());
            // $order =(new Order)->update($request->all()); 
            // return redirect("order.index");
            return redirect()->route('order.index')->with('success', 'Your order has been updated successfully.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect("order.index")->with('success', 'Your order has been deleted successfully.');
    }
}
