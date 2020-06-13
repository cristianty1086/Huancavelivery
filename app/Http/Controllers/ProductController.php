<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\Product as ProductResource;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Product::all();
        return view('products.index',['data' => $rows]);
    }

    /**
     * Display a listing of the resource para un supplier
     *
     * @return \Illuminate\Http\Response
     */
    public function lista($supplier_id)
    {
        //
        $rows = Product::where('supplier_id',$supplier_id)->get();
        return view('products.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $items = Product::create($input);
        return redirect()->route('products.index')
                ->with('�Exito!','Product creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $item = Product::find($id);
        if (is_null($item)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse(new ProductResource($item), 'Product retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')
                ->with('�Exito!','Product actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')
                ->with('�Exito!','El Product se quito con �xito.');
    }
}
