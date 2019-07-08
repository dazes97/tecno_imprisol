<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        return view('products.create')->with('categories', $categories);
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
        Product::create($request->all());
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
        $categories = Category::where('id', '!=', $product->category->id)->get();
        return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
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

    public function reportAllProducts() {

        $products = Product::leftJoin('almacen as a', 'a.id', 'products._id');
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

    public function generarReporte(Request $request) {

        $fecha_inicio = $request->date_inicio;
        $fecha_fin = $request->date_fin;
        $sales = Sale::leftJoin('orders as o', 'o.id', '=', 'sales.order_id')
                        ->leftJoin('clients as c', 'c.id', '=', 'o.client_id')
                        ->where('sales.created_at', '>', $fecha_inicio)
                        ->where('sales.created_at', '<', $fecha_fin)
                        ->select('sales.*', 'c.name', 'o.code as codeped')
                        ->get();
        $fecha = new Carbon('America/La_paz');
        $date = $fecha->format('d-m-Y');
        $pdf = PDF::loadView('sales.reportsAll', 
            ['sales' => $sales, 'fecha' => $date]
        );
        $pdf->setPaper('A4', 'landscape');
        $pdf->output();        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(750, 570, "Pag. {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
       // $canvas->page_text(50, 570, "Usuario", Auth()->name(), 10, array(0, 0, 0));
                
        return $pdf->stream('sales.reportsAll');
    }
}
