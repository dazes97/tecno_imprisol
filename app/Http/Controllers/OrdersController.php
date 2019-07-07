<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Detail;
use App\Product;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth()->id());
        $orders = Order::where('client_id', Auth()->id())->orderBy('id', 'asc')->get();
        //$orders = Order::all();
        //dd($orders);
        //dd($orders);
        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('orders.create')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = new Order();
        $order->code = $request->get('code');
        $order->date = date('Y-m-d');
        $order->description = $request->get('description');
        $order->client_id = Auth()->id();
        $order->save();

        $order = DB::table('orders')->latest('id')->first();
        $order = Order::find($order->id);

        $products = $request->get('products');
        $sumador = 0;
        foreach ($products as $prod)
        {
            $product = Product::find($prod);
            $cantidad = $request->get('quantity'.$product->id);
            $sumador = $sumador + $cantidad *$product->sale_cost;
            $order_details = new Order_Detail();
            $order_details->description = $request->get('description');
            $order_details->quantity = $cantidad;
            $order_details->subtotal = $cantidad*$product->sale_cost;
            $order_details->order_id = $order->id;
            $order_details->product_id = $product->id;
            $order_details->save();
        }

        $order->total_amount = $sumador;
        $order->save();
        return redirect()->route('orders.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('orders.index');
    }
}
