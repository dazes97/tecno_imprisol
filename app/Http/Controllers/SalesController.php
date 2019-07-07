<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Order;
use App\Delibery;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('id','DESC')->get();
        /*$sales = Sale::leftJoin('orders as o', 'o.id', '=', 'sales.order_id')
                        ->leftJoin('client as c', 'c.id', '=', 'o.client_id')
                        ->select('o.*', 'c.name', 'o.code as code_order')
                        ->get();*/
        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::leftJoin('sales as s', 's.order_id', '<>', 'orders.id')
                        ->select('orders.*')
                        ->get();
        return view('sales.create', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::find($order_id);
        $sale = new Sale();
        $sale->code = $request->code;
        $sale->emission_date = $request->date;
        //$sale->total_amount = $request->total_amount;
        $sale->total_amount = $order->total_amount;
        $sale->order_id = $request->order_id;
        $sale->save();

        return redirect()->route('sales.index');
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
        $sale = Sale::findOrFail($id);
        $orders = Order::all();
        return view('sales.edit', ['orders' => $orders, 'sale' => $sale]);
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
        $sale = Sale::findOrFail($id);
        $sale->code = $request->code;
        $sale->emission_date = $request->date;
        $sale->total_amount = $request->total_amount;
        $sale->order_id = $request->order_id;
        $sale->update();

        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
}
