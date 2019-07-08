<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\InventoryCut;
use App\InventoryDetail;
use App\Product;

class InventoryCutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = InventoryCut::all();
        return view('inventory_cuts.index', ['inventories' => $inventories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('inventory_cuts.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventoryCut = new InventoryCut();
        $inventoryCut->description =  $request->description;
        $inventoryCut->date =  $request->date;
        $inventoryCut->administrative_id = Auth::id();
        $inventoryCut->save();
        $products = $request->product_id;
        $previous_stock = $request->previous_stock;
        $new_stock = $request->new_stock;
        $totalStock = 0;
        foreach ($previous_stock as $key => $row) {
            if ($new_stock[$key] != '' && $previous_stock[$key] != '') {
                $inventoryDetail = new InventoryDetail();
                $inventoryDetail->previous_stock = $previous_stock[$key];
                $inventoryDetail->new_stock = $new_stock[$key];
                $inventoryDetail->product_id = $products[$key];
                $inventoryDetail->inventory_cuts_id = $inventoryCut->id;
                $inventoryDetail->save();
                $product = Product::find($products[$key]);
                $product->stock = $new_stock[$key];
                $product->update();
            }
        }

        return redirect()->route('inventories.index');
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
        $inventoryCut = InventoryCut::findOrFail($id);
        $details = InventoryCut::leftJoin('inventory_details as iv', 'iv.inventory_cuts_id', '=', 'inventory_cuts.id')
                                ->select('iv.*')
                                ->where('inventory_cuts.id', $id)
                                ->get();
        foreach ($details as $row) {
            $product = Product::find($row->product_id);
            $product->stock = $row->previous_stock;
            $product->update();
            $inventoryDetail = InventoryDetail::find($row->id);
            $inventoryDetail->delete();
        }
        $inventoryCut->delete();
        return redirect()->route('inventories.index');
    }
}
