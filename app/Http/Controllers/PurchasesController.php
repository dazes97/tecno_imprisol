<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;
use App\Provider;
use App\PurchaseDetail;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $providers = Provider::all();
        return view('purchases.create', ['products' => $products, 'providers' => $providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $purchase = new Purchase();
        $purchase->code = $request->code;
        $purchase->emission_date = $request->date;
        $purchase->total_cost = $request->total_cost;
        $purchase->provider_id = $request->provider_id;
        $purchase->save();

        $products = $request->product_id;
        $costs = $request->cost;
        $quantity = $request->quantity;
        $description = $request->description;
        foreach ($products as $key => $row) {
            if ($costs[$key] != '' && $quantity[$key] != '') {
                $purchaseDetail = new PurchaseDetail();
                $purchaseDetail->description = $description[$key];
                $purchaseDetail->cost = $costs[$key];
                $purchaseDetail->quantity = $quantity[$key];
                $purchaseDetail->product_id = $products[$key];
                $purchaseDetail->purchase_id = $purchase->id;
                $purchaseDetail->save();
                $product = Product::find($products[$key]);
                $product->stock = $product->stock + $quantity[$key];
                $product->update();
            }
        }

        return redirect()->route('purchases.index');
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
        $purchase = Purchase::findOrFail($id);
        $details = Purchase::leftJoin('purchase_details as pd', 'pd.purchase_id', '=', 'purchases.id')
                            ->where('purchases.id', $id)
                            ->get();
        foreach ($details as $row) {
            $detail = new PurchaseDetail();
            $detail = $row;
            $product = Product::find($row->product_id);
            $product->stock = $product->stock - $row->quantity;
            $product->update();
            $detail->delete();
        }

        return redirect()->route('purchases.index');
    }
}
