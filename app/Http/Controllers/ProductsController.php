<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Warehouse;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('products.create', [
            'warehouses' => $warehouses,
            'categories' => $categories
        ]);
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
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->stock = $request->stock;
        $product->purchase_price = $request->purchase_price;
        $product->sale_cost = $request->sale_cost;
        $product->category_id = $request->category_id;
        $product->warehouse_id = $request->warehouse_id;
        $product->save();
        //Product::create($request->all());
        return redirect()->route('products.index');
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
        $product = Product::find($id);
        $warehouses = Warehouse::all();
        $categories = Category::where('id', '!=', $product->category->id)->get();
        return view('products.edit')
                ->with([
                    'product' => $product, 
                    'categories' => $categories, 
                    'warehouses' => $warehouses
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
        $product = Product::find($id);
        $product->code = $request->get('code');
        $product->brand = $request->get('brand');
        $product->model = $request->get('model');
        $product->stock = $request->get('stock');
        $product->purchase_price = $request->get('purchase_price');
        $product->sale_cost = $request->get('sale_cost');
        $product->category_id = $request->get('category_id');
        $product->warehouse_id = $request->get('warehouse_id');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function indexReport() {
        return view('products.indexreports');
    }

    public function generarReporte(Request $request) {

        $fecha_ini = $request->date_inicio;
        $fecha_fin = $request->date_fin;
        $products = Product::leftJoin('warehouses as wh', 'wh.id', '=', 'products.warehouse_id')
                            ->leftJoin('categories as c', 'c.id', '=', 'products.category_id')
                            ->where('products.created_at', '>', $fecha_ini)
                            ->where('products.created_at', '<', $fecha_fin)
                            ->select('products.*', 'c.description as category', 'wh.nombre')
                            ->get();
        $fecha = new Carbon('America/La_paz');
        $date = $fecha->format('d-m-Y');
        $pdf = PDF::loadView('products.productsReport', 
            ['products' => $products, 'fecha' => $date]
        );
        $pdf->setPaper('A4', 'landscape');
        $pdf->output();        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(750, 570, "Pag. {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
       // $canvas->page_text(50, 570, "Usuario", Auth()->name(), 10, array(0, 0, 0));
                
        return $pdf->stream('products.productsReport');
        
        //return $pdf->download('products.productsReporte');
       
    }

    
}
