<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Administrative;
use App\Delivery;
use App\Sale;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::orderBy('id','DESC')->get();
        return view('deliveries.index', ['deliveries' => $deliveries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = Sale::all();
        return view('deliveries.create', ['sales' => $sales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delivery = new Delivery();
        $delivery->code = $request->code;
        $delivery->register_date = $request->register_date;
        $delivery->delivery_date = $request->delivery_date;
        $delivery->destine = $request->destine;
        $delivery->estado = 'P';
        $delivery->sale_id = $request->sale_id;
        $delivery->save();

        return redirect()->route('deliveries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);
        $administratives = Administrative::all();
        $sales = Sale::all();
        return view('deliveries.edit', [
            'delivery' => $delivery, 
            'administratives' => $administratives,
            'sales' => $sales
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $delivery = Delivery::findOrFail($id);
        $delivery->delivery_date = $request->delivery_date;
        $delivery->destine = $request->destine;
        $delivery->estado = 'R';
        $delivery->administrative_id = $request->administrative_id == 0 ? Auth::id() : $request->administrative_id;
        $delivery->update();
        
        return redirect()->route('deliveries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
    }
}
